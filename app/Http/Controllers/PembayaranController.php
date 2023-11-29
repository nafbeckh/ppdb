<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class PembayaranController extends Controller
{
    public function bayar()
    {
        Config::$serverKey    = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized  = config('services.midtrans.isSanitized');
        Config::$is3ds        = config('services.midtrans.is3ds');

        $siswa = Siswa::where('user_id', Auth::user()->id)->first();

        $pembayaran = new Pembayaran();
        $pembayaran->siswa_id = $siswa->id;
        $pembayaran->save();

        $date = Carbon::now();

        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-'. $pembayaran->id,
                'gross_amount' => 10000
            ],
            "item_details" => [
                [
                    'id' => '1',
                    'price' => 10000,
                    'quantity' => 1,
                    'name' => 'Biaya Pendaftaran'
                ]
            ],
            'customer_details' => [
                'first_name' => $siswa->nama,
                'last_name' => '',
                'phone' => $siswa->no_telp
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return response()->json([
            'status'     => 'success',
            'snapToken' => $snapToken,
        ]);
    }

    public function callback(Request $request)
    {
        $serverKey = config('services.midtrans.serverKey');

        $hashed = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {

                $id = substr($request->order_id, strpos($request->order_id, "-") + 1);
                $pembayaran = Pembayaran::find($id);
                $pembayaran->status = 'Paid';
                $pembayaran->update();

                $siswa = Siswa::find($pembayaran->siswa_id);
                $siswa->status = 'Terdaftar';
                $siswa->update();
            }
        }
    }
}

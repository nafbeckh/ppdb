<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_sekolah' => 'required|max:200',
            'tgl_buka' => 'required',
            'tgl_tutup' => 'required',
            'tgl_pengumuman' => 'required',
            'logo' => 'nullable|mimes:jpg,jpeg,png,webp|max:1024'
        ];
    }
}

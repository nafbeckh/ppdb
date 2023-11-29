<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsalSekolahRequest extends FormRequest
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
            'tahun_lulus' => 'required|numeric|digits:4',
            'no_ijazah' => 'nullable|numeric|digits:12',
            'nilai' => 'nullable|numeric'
        ];
    }
}

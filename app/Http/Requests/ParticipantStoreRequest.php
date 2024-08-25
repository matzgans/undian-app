<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipantStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'ktp_id' => 'required|digits:16|unique:participants',  // Ganti 'table_name' dengan nama tabel yang sesuai
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'ktp_image' => 'required|mimes:jpg,jpeg|max:2048',  // Maksimal 2MB, sesuaikan jika perlu
        ];
    }
}

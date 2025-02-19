<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Validator;

class RegisterCompanyRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'company_name' => 'required',
            'company_description' => 'required',
            'company_category' => 'required',
            'company_address' => 'required',
            'total_employee' => 'required',
            'image_url' => 'required|image:jpg,png,svg,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email tidak boleh kosong!',
            'email.email' => 'Email tidak valid!',
            'email.unique' => 'Email sudah digunakan!',
            'password.required' => 'Password tidak boleh kosong!',
            'password.min' => 'Password minimal 8 karakter!',
            'company_name.required' => 'Nama Perusahaan tidak boleh kosong!',
            'company_description.required' => 'Deskripsi Perusahaan tidak boleh kosong!',
            'company_category.required' => 'Kategori Perusahaan tidak boleh kosong!',
            'company_address.required' => 'Alamat Perusahaan tidak boleh kosong!',
            'total_employee.required' => 'Jumlah Karyawan tidak boleh kosong!',
            'image_url.required' => 'Logo Perusahaan tidak boleh kosong!',
            'image_url.image' => 'Format gambar tidak valid!',
        ];
    }

    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'Registrasi gagal!',
            'errorMessage' => $validator->errors(),
        ], 400));
    }

    public function getData()
    {
        $data = $this->validated();
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'company';
        $data['status'] = true;

        return $data;
    }
}

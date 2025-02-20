<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class FreelancerServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->role === 'umum';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'job_category' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Judul tidak boleh kosong!',
            'job_category.required' => 'Kategori pekerjaan tidak boleh kosong!',
            'description.required' => 'Deskripsi tidak boleh kosong!',
            'price.required' => 'Harga tidak boleh kosong!',
            'price.numeric' => 'Harga harus berupa angka!',
            'status.required' => 'Status tidak boleh kosong!',
        ];
    }

    public function failedValidation(Validator $validator) {
        throw new ValidationException(response()->json([
            'status' => 'error',
            'message' => 'Data tidak valid',
            'errorMessage' => $validator->errors(),
        ]));
    }
}

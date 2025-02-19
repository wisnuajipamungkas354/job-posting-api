<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CompanyJobRequest extends FormRequest
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
            'job_title' => 'required',
            'job_category' => 'required',
            'job_type' => 'required',
            'job_level' => 'required',
            'job_description' => 'required',
            'job_salary' => 'required|numeric',
            'job_location' => 'required',
            'deadline_submitted' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'job_title.required' => 'Judul Pekerjaan tidak boleh kosong!',
            'job_category.required' => 'Kategori tidak boleh kosong!',
            'job_type.required' => 'Jenis Pekerjaan tidak boleh kosong!',
            'job_level.required' => 'Level Pekerjaan tidak boleh kosong!',
            'job_description.required' => 'Deskripsi tidak boleh kosong!',
            'job_salary.required' => 'Gaji tidak boleh kosong!',
            'job_location.required' => 'Lokasi tidak boleh kosong!',
            'deadline_submitted.required' => 'Deadline tidak boleh kosong!',
            'status.required' => 'Status tidak boleh kosong!',
        ];

    }

    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'Registrasi gagal!',
            'errorMessage' => $validator->errors(),
        ], 400));
    }
}

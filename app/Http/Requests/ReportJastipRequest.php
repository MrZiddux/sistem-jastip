<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportJastipRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
          // make end date is not before start date
          'start_date' => 'required|date|before_or_equal:end_date',
          'end_date' => 'required|date|after_or_equal:start_date',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
      return [
        'start_date.required' => 'Tanggal awal harus diisi.',
        'start_date.date' => 'Tanggal awal harus berupa tanggal.',
        'start_date.before_or_equal' => 'Tanggal awal tidak boleh lebih dari tanggal akhir.',
        'end_date.required' => 'Tanggal akhir harus diisi.',
        'end_date.date' => 'Tanggal akhir harus berupa tanggal.',
        'end_date.after_or_equal' => 'Tanggal akhir tidak boleh kurang dari tanggal awal.',
      ];
    }
}

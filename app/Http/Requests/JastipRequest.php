<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JastipRequest extends FormRequest
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
            "name" => "required|string",
            "packages" => "required|array",
            "packages.*" => "required|array",
            "packages.*.tracking_number" => "required|string",
            "packages.*.pricing_option" => "in:normal,kubikasi",
            "packages.*.weight" => "required|string",
            "packages.*.length" => "required_if:packages.*.pricing_option,kubikasi|string",
            "packages.*.width" => "required_if:packages.*.pricing_option,kubikasi|string",
            "packages.*.height" => "required_if:packages.*.pricing_option,kubikasi|string",
            "packages.*.cubic_weight" => "required_if:packages.*.pricing_option,kubikasi|string",
        ];
    }
}

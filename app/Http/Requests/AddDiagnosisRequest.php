<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDiagnosisRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "description" => 'required',
            "description_employee" => 'required',
            "case" => 'required|integer|in:1,2',
        ];
    }

    public function messages()
    {
        return [
            'description.required' => trans('validation.required'),
            'description_employee.required' => trans('validation.required'),
            'case.required' => trans('validation.required'),
        ];
    }
}
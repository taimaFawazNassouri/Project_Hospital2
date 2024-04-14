<?php

namespace App\Http\Requests;
use App\Models\Patient;
use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentPatient extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            "email" => 'required|email|unique:patients,email,' . $this->id,
            "phone" => 'required|numeric|unique:patients,phone,' . $this->id,
            "name" => 'required|regex:/^[A-Za-z0-9-أ-ي-pL\s\-]+$/u',
            "section_id" => 'required',
            "doctor_id" => 'required',

        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('validation.required'),
            'email.email' => trans('validation.email'),
            'email.unique' => trans('validation.unique'),
            'phone.required' => trans('validation.required'),
            'phone.numeric' => trans('validation.numeric'),
            'phone.unique' => trans('validation.unique'),
            'name.required' => trans('validation.required'),
            'name.regex' => trans('validation.regex'),
            'section_id.required' => trans('validation.required'),
            'doctor_id.required' => trans('validation.required'),

        ];
    }

}

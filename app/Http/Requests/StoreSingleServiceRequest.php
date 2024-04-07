<?php

namespace App\Http\Requests;

use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSingleServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => 'required|unique:service_translations,name,'.$this->id,'Service_id',
            'price' => 'numeric|required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
            'name.unique' => trans('validation.unique'),
            'price.required' => trans('validation.required'),
            'price.numeric' => trans('validation.numeric'),
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class CreatePatientValidator extends FormRequest
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
            'nome' => 'required|string|max:100',
            'cpf' => [
                'required',
                'string',
                'max:20',
                'regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/',
                Rule::unique('pacientes')->ignore($this->id_paciente),
            ],
            'celular' => [
                'required',
                'string',
                'max:20',
                'regex:/^\(\d{2}\) \d \d{4}\-\d{4}$/'
            ],
        ];
    }

    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([

            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()

        ]));
    }
}

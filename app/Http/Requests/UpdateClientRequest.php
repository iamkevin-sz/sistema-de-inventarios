<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'string|required|max:255',
            'dni' => 'string|required|unique:clients,dni,'.$this->route('client')->id.'|min:8|max:8',
            'ruc'=> 'nullable|string|unique:clients,ruc,'.$this->route('client')->id.'|min:11|max:11',
            'address' => 'nullable | string | max:255 ',
            'phone' => 'string |nullable|unique:clients,phone,'.$this->route('client')->id.'| min:9|max:9',
            'email' => 'string|nullable|unique:clients,email,'.$this->route('client')->id.'|max:255|email:rfc,dns',
        ]    ;
    }

    public function messages(){
        return [
            'name.string' => 'El valor no es correcto',
            'name.required' => 'El campo es requerido',
            'name.max' => 'Solo se permite 255 caracateres',

            'dni.string' => 'El valor no es correcto',
            'dni.required' => 'El campo es requerido',
            'dni.unique' => 'Solo se permite 255 caracateres',
            'dni.min' => 'Se requiere 8 caracteres',
            'dni.max' => 'Solo se permite 255 caracateres',

            'ruc.string' => 'El valor no es correcto',
            'ruc.unique' => 'Solo se permite 255 caracateres',
            'ruc.min' => 'Se requiere 8 caracteres',
            'ruc.max' => 'Solo se permite 255 caracateres',

            'address.string' => 'El valor no es correcto',
            'address.max' => 'Solo se permite 255 caracateres',

            'phone.string' => 'El valor no es correcto',
            'phone.unique' => 'Solo se permite 255 caracateres',
            'phone.min' => 'Se requiere 8 caracteres',
            'phone.max' => 'Solo se permite 255 caracateres',

            'email.string' => 'El valor no es correcto',
            'email.unique' => 'Solo se permite 255 caracateres',
            'email.max' => 'Solo se permite 255 caracateres',
            'email.email' => 'No es un correo electronico',

        ];
    }
}

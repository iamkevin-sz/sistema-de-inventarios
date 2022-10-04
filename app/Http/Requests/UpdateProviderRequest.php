<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProviderRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|unique:providers,email,'.$this->route('provider')->id.'|max:255',
            'ruc_number' => 'required | string |min:11|unique:providers,ruc_number,'.$this->route('provider')->id.'|max:11', //unico quiere decir que no se puede repetir, por ejemplo no se puede repetir el number ruc
            'address' => 'nullable | string | max:255 ',
            'phone' => 'required | string |min:9|unique:providers,phone,'.$this->route('provider')->id.'|max:9',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Este campo es requerido',
            'name.string' => 'El valor no es correcto',
            'name.max' => 'Solo se permite 255 caracateres',

            'email.required' => 'Este campo es requerido',
            'email.email' => 'Este campo es requerido',
            'email.string' => 'El valor no es correcto',
            'email.max' => 'Solo se permite 200 caracateres',
            'email.unique' => 'Este correo ya existe',

            'ruc_number.required' => 'Este campo es requerido',
            'ruc_number.string' => 'El valor no es correcto',
            'ruc_number.max' => 'Solo se permite 11 caracateres',
            'ruc_number.min' => 'Solo se permite 11 caracateres',
            'ruc_number.unique' => 'Este numero de ruc ya existe',

            'address.max' => 'Solo se permite 255 caracateres',
            'address.string' => 'El valor no es correcto',

            'phone.required' => 'Este campo es requerido',
            'phone.string' => 'El valor no es correcto',
            'phone.max' => 'Solo se permite 9 caracateres',
            'phone.min' => 'Solo se permite 9 caracateres',
            'phone.unique' => 'Este telefono ya existe',
        ];

}

<?php

namespace App\Http\Requests;

use App\Rules\AlphaSpaces;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UpdateUserProfile extends FormRequest
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
        $userId = Auth::id();

        return [
            //tez moze byc tablica tutaj
            'email' => [
                'required',
                //'unique:users'
                Rule::unique('users')->ignore($userId),
                'email'
        ],
            'name' => [
            'required',
            'max:20',
            new AlphaSpaces()
            ],
            'phone' => [
                'min:6'
            ]
        ];
    }

    public function messages()
    {
        //wypisanie errorów po polsku
        return[
            'email.unique' => 'Adres email jest zajety',
            'name.max' => 'Maksymalna ilość znaków to: :max' //wykorzystuje zmienną max
        ];
    }
}

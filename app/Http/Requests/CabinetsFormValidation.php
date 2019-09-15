<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CabinetsFormValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'first_name' => 'required|max:255',
            'image'  => 'file|mimes:png,jpg,jpeg,gif|max:10240',
            'last_name' => 'required|max:255',
             'email' => 'required|unique:posts|max:255',
            'phone'=> 'nullable|unique:posts|max:12',
             'telegram' => 'nullable|max:255',
            'date_of_birth' => 'required|max:40',
            'city_of_residence' => 'required|max:40',
            'about_self' => 'nullable|max:500'
        ];
    }
}
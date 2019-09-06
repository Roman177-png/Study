<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OffersFormValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'price' => 'required|numeric|max:9999999999',
            'image'  => 'file|mimes:png,jpg,jpeg,gif|max:10240',
            'description' => 'nullable|max:500'

        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesFormValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'image'  => 'file|mimes:png,jpg,jpeg,gif|max:10240',
            'description' => 'required|max:255'

        ];
    }
}
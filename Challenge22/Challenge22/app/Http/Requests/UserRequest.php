<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|alpha|max:15',
            'lastname' => 'required|alpha|max:25',
             'email' =>'nullable|email'
        ];
    }
}
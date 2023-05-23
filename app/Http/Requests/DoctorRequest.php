<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    
    public function authorize():bool
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'contact' => 'nullable|digits:10|numeric',
            'address' => 'nullable',
            'specialist' => 'nullable',
            'join_date' => 'nullable',
            'gender' => 'nullable',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif',
            'description' => 'nullable|max:300',
        ];

        if ($this->getMethod() === 'POST') {
            $rules['name'] = 'required';
            $rules['email'] = 'required|email|unique:users';
            $rules['password'] = 'required|min:8|confirmed';
        }

        return $rules;
    }
}

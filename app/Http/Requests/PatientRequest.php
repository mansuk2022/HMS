<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'nullable|email',
            'contact' => 'required|digits:10|numeric',
            'address' => 'required',
            'doctor_id' => 'required',
            'appointment_time' => 'required',
            'gender' => 'required',
            'image' => "nullable|mimes:jpeg,png,jpg,gif",
            'description' => 'nullable|max:300',
            'age'=>'required|integer'
        ];
    }
}

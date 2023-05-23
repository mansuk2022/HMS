<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    
    public function authorize():bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'event_title'=>'required',
            'event_description'=>'required',
            'event_location'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
        ];
    }
}

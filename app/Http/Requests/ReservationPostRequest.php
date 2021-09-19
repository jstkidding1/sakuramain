<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ReservationPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address' => 'required',
            'contact_num' => 'required|regex:/(9)[0-9]{9}/|max:10',
            'comments' => 'required',
            'vehicle_id' => 'required|unique:reservations,vehicle_id,NULL,id,user_id,'.\Auth::id(),
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'email address',
        ];
    }

    public function messages()
    {
        return [
            'address.regex' => 'Address is fucking required.',
            'contact_num.regex' => 'Contact num is fucking required.',
            'vehicle_id.unique:reservations,vehicle_id' => 'You can only submitted once.'
        ];
    }
}

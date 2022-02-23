<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddManagerRequest extends FormRequest
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
        return [
            'name' => 'required|max:70',
            'email' => 'required|email',
            'password' => 'required|min:8|max:20',
            'national_id' => 'required|numeric|digits:14',
            'country' => 'required|not_in:-1',
            'gender' => 'required',
            'usrImg' => 'required|mimes:jpeg,jpg'
        ];
    }
}
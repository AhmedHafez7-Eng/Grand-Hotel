<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateManagerRequest extends FormRequest
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
            'name' => 'max:70',
            'email' => 'email',
            'password' => 'min:8|max:20',
            'national_id' => 'numeric|digits:14',
            'country' => 'not_in:-1',
            'usrImg' => 'mimes:jpeg,jpg'
        ];
    }
}
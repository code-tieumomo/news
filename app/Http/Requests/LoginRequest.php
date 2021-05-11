<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'bail|required|email|max:225',
            'password' => 'required|min:8',
            'remember' => 'required'
        ];
    }

    /**
     * The key to be used for the view error bag.
     *
     * @var string
     */
    protected $errorBag = 'login';
}

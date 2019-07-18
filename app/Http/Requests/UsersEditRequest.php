<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersEditRequest extends Request
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
            //
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'old_password' => 'required',
            'password' => 'confirmed',
            'is_active' => 'required',
            'role_id' => 'required',
            'photo_id' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}

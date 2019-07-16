<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostsCreateRequest extends Request
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
            'title'         => 'required|max:255',
            'body'          => 'required',
            'photo_id'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id'   => 'required'
        ];
    }
}

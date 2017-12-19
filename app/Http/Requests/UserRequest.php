<?php

namespace Gelladus\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id = $this->route('registro');

        return [
            'name' => "required",
            'email' => "required|string|email|max:255|unique:users,id,{$id}"
        ];
    }
}

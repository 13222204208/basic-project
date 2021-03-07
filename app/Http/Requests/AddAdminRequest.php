<?php

namespace App\Http\Requests;

use App\Http\Requests\BasicRequest;

class AddAdminRequest extends BasicRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|min:6|max:25|unique:admins',
            'password' => 'required|min:6|max:30',
            'name' => 'required|min:2|max:25',
            'phone' => 'required|regex:/^1[345789][0-9]{9}$/',
          ];
    }

    public function messages()
    {
        return [
            'username.required' => '用户名必填',
            'password.required' => '密码必填',
            'phone.regex' => '手机格式无效',
            'username.unique' => '用户名已重复',
        ];
    }

}

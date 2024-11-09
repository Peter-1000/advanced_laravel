<?php


namespace App\Request\User;


use App\Request\BaseRequestFormAi;

class CreateUserRequest extends BaseRequestFormAi
{

    public function rules()
    {
        return [
            'name'     => 'required|min:2|max:50',
            'email'    => 'required|min:5|max:50|email|unique:users,email',
            'password' => 'required|min:6|max:50|confirmed'
        ];
    }

    public function authorized()
    {
        return true;
    }
}

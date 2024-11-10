<?php


namespace App\Request\User;


use App\Request\BaseRequestFormAi;

class LoginUserRequest extends BaseRequestFormAi
{

    public function rules()
    {
        return [
            'email'    => 'required|min:5|max:50|email',
            'password' => 'required|min:6|max:50'
        ];
    }

    public function authorized()
    {
        return true;
    }
}

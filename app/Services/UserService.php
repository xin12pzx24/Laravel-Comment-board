<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;
//use App\User as UserEloquent;
//use DB;
//use Hash;
//use Storage;


class UserService
{
    public function register($data)
    {
        $data['password'] = bcrypt($data['password']);
        User::create($data);
    }
}
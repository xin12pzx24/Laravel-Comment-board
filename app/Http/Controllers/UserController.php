<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Services\UserService;

class UserController extends Controller
{
    public function register(Request $request)
    {
        //return response()->json("註冊成功",200); //work

        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,
            [
                'account' =>[
                    'required',
                    'between:6,20',
                    'unique:users',
                ],
                'password' =>[
                    'required',
                    'between:6,20',
                ],
                'name' =>[
                    'required',
                    'max:20',
                ]
            ],
            [
                'account.required' => '請輸入帳號',
                'account.between' => '帳號需介於6-20字元',
                'account.unique' => '帳號已存在',
                'password.required' => '請輸入密碼',
                'password.between' => '密碼需介於6-20字元',
                'name.required' => '請輸入暱稱',
                'name.max' => '暱稱不可超過20字元'
            ]
        );
        //return response()->json($objValidator->errors()->all(),200); // return []
        //return response()->json($postData,200); // return {"account":123456,"password":123456,"name":123}

        if ($objValidator->fails()) 
            return response()->json($objValidator->errors()->all(),400);
        $userService = new UserService();
        $userService->register($postData);
        return response()->json("註冊成功",200);
    }

    public function login(Request $request)
    {
        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,
            [
                'account' =>[
                    'required',
                ],
                'password' =>[
                    'required'
                ]
            ],
            [
                'account.required' => '請輸入帳號',
                'password.required' => '請輸入密碼',
            ]
        );

        if ($objValidator->fails()) 
            return response()->json($objValidator->errors()->all(),400);
        $userService = new UserService();
        $result = $userService->login($postData);
        //return response()->json([$result,strlen($result)],(strlen($result) == 12)? 400: 200);
        return response()->json([$result],(strlen($result) == 12)? 400: 200);
        //return response()->json("登入成功",200);
    }
}

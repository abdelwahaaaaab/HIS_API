<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\API\BaseController as BaseController;

class AuthController extends BaseController
{
    public function register(Request $request){
        $validator =  Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' =>'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]
        );
        if($validator->fails())
        {
            return $this->SendError('Invalid', $validator->errors());
        }
        else
        {
            $input = $request->all();
            $input['password'] =  Hash::make($input['password']);
            $user = User::create($input);
            $success['token'] = $user->createToken('HISProject')->accessToken;
            $success['name'] = $user->name;
            return $this->SendResponse($success, 'Register Successfully'); 
        }

    }
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = Auth::user();
            $success['token'] = $user->createToken('HISProject')->accessToken;
            $success['name'] = $user->name;
            return $this->SendResponse($success, 'Login Successfully');
        }
        else
        {
            return $this->sendError('Unauthorized',['error','Unauthorized'] );
        }
    }
}

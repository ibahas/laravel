<?php

namespace App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'email' => 'unique:users|email',
            'name' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',

        ]);

        if ($validator->fails()) {
            return $this->sendError('error validation', $validator->errors());
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        return $this->sendResponse($success, 'User created successfully');

    }
}

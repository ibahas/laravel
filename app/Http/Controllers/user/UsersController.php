<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function show()
    {
        $user_id = Auth::user()->id;
        return User::where('id', $user_id)->first();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\User;

class UserAuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function create(Request $req){
        // return $req->input();
        $validator = Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|string|confirmed|min:6',
        ]);
            // $u = new User;
            // $u->name = $req->input('name');
            // $u->email = $req->input('email');
            // $u->password = $req->input('password');
            // $u->confirmed= $req->input('confirm_password');

    }
}

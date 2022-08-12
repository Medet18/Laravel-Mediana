<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\User;
use Carbon\Carbon;

class UserAuthController extends Controller
{
    //
    public function test(){
        //$myDate = '12/08/2020';
        //$myDate = '2 September 2022';
        //$myDate = date("d/m/Y", strtotime('10 September ,2022'));;
       // $myDate = date("d/m/Y", strtotime('10/08/2020'));
       //$myDate = date("d.m.Y", strtotime('10.08.2020')); 
       //$date = Carbon::createFromFormat('d/m/Y', $myDate)->format('Y-m-d');
       // $date = Carbon::createFromFormat(date("Y-m-d", strtotime($req->date_of_sale)), $myDate)->format('Y-m-d');
      // $date = Carbon::parse($myDate)->format('d-m-Y');
  
        //dd($date);
        //return $date;
        $dt = Carbon::create('12 October ,2010');
        $date2 = $dt -> toDateString();
        return $date2;
    }
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

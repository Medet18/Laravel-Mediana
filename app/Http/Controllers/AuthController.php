<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Validator;
use Carbon\Carbon;
use Product\ProductController   as ProductController;




class AuthController extends Controller
{
    //
    public function _construct(){
        $this->middleware('auth:api',['except'=>['login','register']]);
    }
    public function register(Request $req){
        $validator = Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|string|confirmed|min:6',
        ]);
        
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }
        $user = User::create(array_merge(
            $validator->validated(),
            ['password'=>bcrypt($req->password)]
        ));
        return response()->json([
            'message'=>'User succesfully registered',
            'user'=>$user
        ], 201);

    }
    public function login(Request $req){
        $validator = Validator::make($req->all(),[
            'email'=>'required|email',
            'password'=>'required|string|min:6',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),422);
        }
        if(!$token=auth()->attempt($validator->validated())){
            return response()->json(['error'=>'Unauthorized'],401);
        }
        return $this->createNewToken($token);
    }

    public function createNewToken($token){
        return response()->json([
            'acces_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>auth()->factory()->getTTL()*60,
            'user'=>auth()->user()
        ]);
    }

    public function profile(Request $req){
        return response()->json([auth()->user()]);
    }
 
    public function logout(){
        auth()->logout();
        return response()->json([
            'message'=>'User logged out!!',
        ]);
    }
    public function getAuthUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        $user = JWTAuth::authenticate($request->token);
 
        return response()->json(['user' => $user]);
    }
}

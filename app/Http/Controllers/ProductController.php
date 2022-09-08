<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product2;
use JWTAuth;
use App\Models\User;
use Carbon\Carbon;
use Auth; 

class ProductController extends Controller
{
    //
    public function index(){
        $product = Product::all();
        return response()->json(['product'=>$product], 200);
    }
    
    public function show($id){
        $product = Product::find($id);
        if($product){
            return response()->json(['product'=>$product], 200);
        }
        else{
            return response()->json(['message'=>'No product found'], 404);
        }
    }    
    public function store(Request $req){
        // $req->validate([
        //     'name'=>'required|max:191',
        //     'descrip'=>'required|max:191',
        //     'price'=>'required|max:191',
        //     'qty'=>'required|max:191',
        //     //'adminId'=>'required|max:191',
        //     //'date_of_sale'=>'required|max:191'
        //     //'user_id'=>'required|max:191'
        // ]);

        $pro = new Product2();
        $pro->name = $req->name;
        $pro->description = $req->descrip;
        $pro->price = $req->price;
        $pro->qty = $req->qty;
        // $pro->adminId = $req->adminId;
        // $pro->date_of_sale = Carbon::create($req->date_of_sale)->toDateString();
        // // $pro->date_of_sale = date("Y-m-d", strtotime($req->date_of_sale));
//      $pro->user_id = \Auth::id();

        $pro->save();
        
        return response()->json(['message'=>'Data susccesfully stored'],200);
    }

    public function update(Request $req, $id){
        $req->validate([
            'name'=>'required|max:191',
            'descrip'=>'required|max:191',
            'price'=>'required|max:191',
            'qty'=>'required|max:191',
           // 'adminId'=>'required|max:191'
        ]); 

        $pro = Product::find($id);
        $oldPro = Product::find($id);
        // $myDate = date("d/m/Y", strtotime($req->date_of_slae));
        // $date = Carbon::createFromFormat('d/m/Y', $myDate)->format('Y-m-d'); 
            
        if($pro){
            $pro->name = $req->name;
            $pro->description = $req->descrip;
            $pro->price = $req->price;
            $pro->qty = $req->qty;
            $pro->adminId = $req->adminId;

            //$myDate = date("d/m/Y", strtotime($req->date_of_slae));
           // $dt = Carbon::create($req->date_of_sale);
            $pro->date_of_sale = Carbon::create($req->date_of_sale)->toDateString();
            //$pro->update();
            
            $newPro = $pro;
            if($oldPro != $newPro){
                $pro->update();
                return response()->json(['message'=>'Dates susccesfully updated'],200);
            }
            else{
                return response()->json(['message' => 'Nothing to upodate']);
            }
        
        }
        else{    
            return response()->json(['message'=>'No Product found'],404);
        }
    }
    
    public function destroy($id){

        $pro = Product::find($id);
        if($pro){
            $pro->delete();
            
            return response()->json(['message'=>'Data Deleted susccesfully'],200);
        }
        else{    
            return response()->json(['message'=>'No Product found'],404);
        }
    }
    public function getProductsAdmin(){
       // $pro = Product::where('adminId', 1)->get();
       //$u = User::where('role',2)->get();
    //    return response()->json([\Auth::id()],200);

        // if(User::where('role', \Auth::id())){
        //     $pro = Product::where('adminId', 1)->get();
        //     return response()->json(['product'=>$pro],200);
        // }
        // elseif(User::where('role', 2)){
        //     $pro = Product::where('adminId', 2)->get();
        //     return response()->json(['product'=>$pro],200);
        // }
        // else{
        //     $product = Product::all();
        //     return response()->json(['product'=>$product], 200);
        // }
        if(\Auth::id() == 1){
            $pro = Product::where('adminId', 1)->get();
            return response()->json(['product'=>$pro],200);
        }
        elseif(\Auth::id() == 2){
            $pro = Product::where('adminId', 2)->get();
            return response()->json(['product'=>$pro],200);
        }
        else{
            $product = Product::all();
            return response()->json(['product'=>$product], 200);
        }
    }
    
}

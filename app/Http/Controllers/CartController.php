<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartList(){

        $cartList = Cart::all();
        return response()->json(['Cart List'], 201);
    }

    public function addTocart(Request $request){

        $productId = $request->product_id;
        $userId = Auth::user();
        $quantity = $request->quantity;


        $cart = Cart::create([
            "productId" => $userId,
            "user_id" => $userId,
            "quantity" => $quantity,
        ]);

        return response()->json(['Add to Cart Successfully'], 201);

    }

    public function removeTocart(){


        return response()->json(['Remove to Cart Successfully'],404);
    }

}

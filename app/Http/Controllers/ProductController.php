<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use function Illuminate\Filesystem\name;

class ProductController extends Controller
{

    public function index()
    {
        return response()->json([
            'message' => "Product List", Product::all(), 200]);
    }


    // public function create()
    // {
    //     //
    // }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required | max:255',
            'description' => 'required',
            'price' => 'required | numeric',
        ]);

        $product = Product::create($validateData);
        return response()->json(['message' => 'Product Added Successfully',$product, 201]);
    }


    public function show(string $id)
    {
        $product = Product::find($id);

        if($product){
            return response()->json(
            [
                'message'=> 'Show Product',
                'data' => [
                    'id' => $product->id,
                    'name'=> $product->name,
                    'description'=> $product->description,
                    'price'=> $product->price,
                    'created_at'=> $product->created_at,
                    'updated_at'=> $product->updated_at,
                ],

            ], 200);
        }else
        {
            return response()->json(['message'=> "Product not found"], 404);
        }
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        $validateData = $request->validate([
            'name' => 'required | max:255',
            'description' => 'required',
            'price' => 'required | numeric',
        ]);

        if($product){
            $product->update($validateData);
            return response()->json($product, 200);
        }else{
            return response()->json(['message' => 'Product not found'], 404);
        }

    }


    public function destroy(Product $product)
    {
        if($product){
            $product->delete();
            return response()->json(['message'=> 'Product Delete Successfully', 200]);
        }else{
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
}

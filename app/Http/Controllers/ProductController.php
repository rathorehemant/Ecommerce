<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function productsListing(){
        $products = Product::orderBy('id', 'desc')->get();
        return view('productListing',['products'=>$products]);
    }

    public function productsAdding(){
        return view('productAdding');
    }

    public function saveProducts(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'productImage' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return redirect('add-products')
                ->withErrors($validator)
                ->withInput();
        }else{
           
            $product_image = $request->file('productImage');
             $product_image_new_name = time().'.'.$product_image->getClientOriginalExtension();
             // Save the original image
             $product_image->move(public_path('product_image'), $product_image_new_name);
            $product=Product::create([

                'title' =>  $request->input('title'),
                'price' =>  $request->input('price'),
                'image' => 'product_image/'.$product_image_new_name

            ]);
        }
    }
}

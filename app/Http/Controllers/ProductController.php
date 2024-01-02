<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function productsListing(){
        $products = Product::orderBy('id', 'desc')->get();
        return view('productListing',['products'=>$products]);
    }

    public function productsAdding(){
        return view('productAdding');
    }
}

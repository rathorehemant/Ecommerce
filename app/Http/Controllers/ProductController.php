<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_category;
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

            if($product){
                return redirect('add-products')->with('success', 'Product added successfully');
            }else{
                return redirect('add-products')->with('error', 'Failed to add the product');
            }

            
        }
    }



    public function productsCategoryListing(){
        $products_categories = Product_category::orderBy('id', 'desc')->get();
        return view('categoryListing',['products_categories' => $products_categories ]);
    }

    public function productsCategoryAdding(){
        return view('categoryAdding');
    }


    public function saveproductsCategory(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('products/add-categories')
                ->withErrors($validator)
                ->withInput();
        }else{

        $product_category = Product_category::create([
            'title' => $request->input('title')
        ]);

        if($product_category){
            return redirect('products/add-categories')->with('success', 'Product Category added successfully');
        }else{
            return redirect('products/add-categories')->with('error', 'Failed to add the product Category');
        }
    }

    }


    public function deleteProduct($product_id){

        // first find the product category is valid or not
        $find_product_id = Product::find($product_id);
        if(!empty($find_product_id)){
            if($find_product_id->delete()){
                $return_data = [
                    'success' => true,
                    'message' => 'Your Product has deleted successfully..'
                ];
            }else{
                $return_data = [
                    'success' => false,
                    'message' => 'Somethng went wrong please try again after some time'
                ];  
            }
            
        }else{
            $return_data = [
                'success' => false,
                'message' => 'Sorry This Product id does not exist in our database'
            ];       
        }

        return response()->json($return_data);
        
    }


    public function deleteProductCategory($productCategory_id){

        // first find the product category is valid or not
        $find_productCategory_id = Product_category::find($productCategory_id);
        if(!empty($find_productCategory_id)){
            if($find_productCategory_id->delete()){
                $return_data = [
                    'success' => true,
                    'message' => 'Your Product Category has deleted successfully..'
                ];
            }else{
                $return_data = [
                    'success' => false,
                    'message' => 'Somethng went wrong please try again after some time'
                ];  
            }
            
        }else{
            $return_data = [
                'success' => false,
                'message' => 'Sorry This Product Category id does not exist in our database'
            ];       
        }

        return response()->json($return_data);
        
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'image','price','categoryId','gallary_image','description','stocks'];

    protected static function boot()
    {
        parent::boot();

    // Generate and set the unique slug before creating a new product
    static::creating(function ($product) {
        $slug = Str::slug($product->title);

        $count = static::where('slug', 'LIKE', $slug . '%')->count();

        if ($count > 0) {
            $product->slug = $slug . '-' . ($count + 1);
        } else {
            $product->slug = $slug;
        }
    });
    }


    public function getProductDetailsByProductId($product_id){
        return $this->select('products.*','product_categories.title as categoryName')
        ->join('product_categories', 'product_categories.id', '=', 'categoryId')
        ->where('products.id', '=', $product_id)
        ->get();
    }
}

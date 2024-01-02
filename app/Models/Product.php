<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'image','price'];

    protected static function boot()
    {
        parent::boot();

        // Generate and set the slug before creating a new product
        static::creating(function ($product) {
            $product->slug = Str::slug($product->title);
        });
    }
}

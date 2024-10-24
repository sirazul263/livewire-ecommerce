<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 
        'slug' , 
        'short_description', 
        'long_description', 
        'regular_price',
        'sale_price',
        'image', 
        'images',
        'color',
        'size',
        'is_active',
        'is_featured', 
        'on_sale',
        'created_at' , 
        'updated_at',
    ];

    public function category(){
       return $this->belongsTo(Category::class);
    }
}

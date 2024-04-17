<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'slug', 
        'description',
        'price', 
        'compare_price',
        'category_id',
        'is_featured',
        'sku',
        'barcode',
        'track_qty', 
        'qty', 
        'status',
        'image'
    ];

    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function images()
    // {
    //     return $this->hasMany(ProductImage::class);
    // }

    public function productImage()
{
    return $this->hasOne(ProductImage::class);
}
}

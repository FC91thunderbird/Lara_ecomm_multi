<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','subcategory_id', 'product_name', 'product_slug','product_code', 'product_qty', 'product_tags', 'product_size', 'product_color','purchase_price',
    'selling_price', 'discount_price', 'short_description','long_description', 'product_thumbnail', 'product_images', 'hot_deals', 'featured',
    'new_arrival', 'special_offer', 'special_deals', 'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(Image::class,'product_id', 'id');
    }
}

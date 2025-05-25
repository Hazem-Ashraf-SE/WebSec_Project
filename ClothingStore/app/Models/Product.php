<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer'
    ];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            // Ensure the path is correct and the file exists
            $path = 'storage/' . $this->image;
            return asset($path);
        }
        // Use a default product image as fallback
        return asset('img/product/product-1.jpg');
    }
} 
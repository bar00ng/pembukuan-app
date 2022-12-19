<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'productName',
        'productPrice',
        'productModel',
        'category_id',
        'inStock',
        'isActive'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}

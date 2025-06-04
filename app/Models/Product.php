<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['name', 'small_desc', 'desc', 'status', 'sku', 'available_for', 'price', 'discount', 'start_discount',
                           'end_discount', 'manage_stock', 'quantity', 'available_in_stock', 'views', 'category_id', 'brand_id'];
}

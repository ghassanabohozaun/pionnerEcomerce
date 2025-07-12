<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class productImage extends Model
{
    use SoftDeletes;
    protected $table = 'product_images';
    protected $fillable = ['file_name', 'file_size', 'file_type', 'product_id'];
}

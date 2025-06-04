<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product_preview extends Model
{
    use SoftDeletes;
    protected $table = 'product_previews';
    protected $fillable = ['comment', 'product_id', 'user_id'];
}

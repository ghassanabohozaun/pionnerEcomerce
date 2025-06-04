<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class shipping_governorate extends Model
{
      use SoftDeletes;
    protected $table = 'tags';
    protected $fillable = ['price','governorate_id'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingGovernorate extends Model
{
      use SoftDeletes;
    protected $table = 'shipping_governorates';
    protected $fillable = ['price','governorate_id'];
}

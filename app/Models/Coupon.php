<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use SoftDeletes;
    protected $table = 'coupons';
    protected $fillable = ['code', 'discount', 'discount_percentage', 'expire_date', 'limit', 'time_used', 'is_active'];


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
        use SoftDeletes;
    protected $table = 'cities';
    protected $fillable = ['name', 'governorate_id'];
}

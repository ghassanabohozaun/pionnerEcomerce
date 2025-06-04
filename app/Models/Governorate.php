<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Governorate extends Model
{
    use SoftDeletes;

    protected $table = 'governorates';
    protected $fillable = ['name' , 'country_id'];
}

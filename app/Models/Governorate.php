<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Governorate extends Model
{
    use SoftDeletes, HasTranslations;

    protected $table = 'governorates';
    protected $fillable = ['name', 'country_id', 'status'];
    public $timestamps = false;
    public array $translatable = ['name'];

    // relation
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'governorate_id');
    }

    public function users(){
        return $this->hasMany(User::class );
    }

    public function shippingPrice(){
        return $this->hasOne(ShippingGovernorate::class , 'governorate_id');
    }

    // accsessores
    public function getStatusAttribute($status)
    {
        return $status == 1 ? 'on' : '';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'countries';
    protected $fillable = ['name', 'phone_code', 'flag_code', 'status'];

    public $timestamps = false;

    public array $translatable = ['name'];

    // relation
    public function governorates()
    {
        return $this->hasMany(Governorate::class, 'country_id', 'id');
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    // accessories
    public function getStatusAttribute($status)
    {
        return $status == 1 ? 'on' : '';
    }
}

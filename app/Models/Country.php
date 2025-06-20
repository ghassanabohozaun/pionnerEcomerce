<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'countries';
    protected $fillable = ['name', 'phone_code', 'status'];

    public $timestamps = false;

    public array $translatable = ['name'];

    // relation
    public function governorates()
    {
        return $this->hasMany(Governorate::class, 'country_id', 'id');
    }

    // accessories
    public function getStatusAttribute($status)
    {
        return $status == 1 ? 'on' : '';
    }
}

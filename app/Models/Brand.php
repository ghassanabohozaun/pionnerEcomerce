<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

use function PHPSTORM_META\elementType;

class Brand extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'brands';
    protected $fillable = ['name', 'slug', 'logo', 'status'];
    public array $translatable = ['name', 'slug'];

    //relations
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
    // scopes
    public function scopeActive($qurey)
    {
        return $qurey->whereStatus(1);
    }

    public function scopeInactive($qurey)
    {
        return $qurey->whereStatus(0);
    }

    // accessories
    // public function getStatusAttribute($status)
    // {
    //     return $status == 1 ? 'on' : '';
    // }

    public function getCreatedAtAttribute($value)
    {
        // return  date('Y-m-d', strtotime($value));
        return Carbon::parse($value)->format('d/m/Y h:i A');
    }

    // public function getLogoAttribute($logo)
    // {
    //     return '/uploads/brands/' . $logo;
    // }
}

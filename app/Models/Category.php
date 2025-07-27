<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'status', 'parent', 'icon'];

    // translation
    public array $translatable = ['name', 'slug'];

    // relation
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
    public function parentRelation()
    {
        return $this->hasOne(Category::class, 'id', 'parent');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent', 'id');
    }

    // scopes
    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }
    public function scopeInactive($query)
    {
        return $query->whereStatus(0);
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
}

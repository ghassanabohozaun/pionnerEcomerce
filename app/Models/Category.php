<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'status', 'parent'];

    public array $translatable = ['name', 'slug'];

    // relation
    public function parent()
    {
        return $this->hasOne(Category::class, 'id', 'parent');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent', 'id');
    }
    // accessories
    public function getStatusAttribute($status)
    {
        return $status == 1 ? 'on' : '';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

use function PHPSTORM_META\elementType;

class Brand extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'brands';
    protected $fillable = ['name', 'logo', 'status'];
    public array $translatable = ['name'];

    // accessories
    public function getStatusAttribute($status)
    {
        return $status == 1 ? 'on' : '';
    }
}

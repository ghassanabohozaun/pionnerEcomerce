<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Faq extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'faqs';
    protected $fillable = ['question', 'answer','status'];
    public array $translatable = ['question', 'answer'];

    // relations
    public function getStatusAttribute($status)
    {
        return $status == 1 ? 'on' : '';
    }
}

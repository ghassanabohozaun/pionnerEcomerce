<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Faq extends Model
{
    use SoftDeletes, HasTranslations ,HasFactory;
    protected $table = 'faqs';
    protected $fillable = ['question', 'answer', 'status'];
    public array $translatable = ['question', 'answer'];

    // relations

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i a');
    }
}

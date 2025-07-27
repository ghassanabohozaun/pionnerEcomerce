<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqQuestion extends Model
{
    protected $table = 'faq_questions';
    protected $fillable = ['name', 'email', 'subject', 'message'];
}

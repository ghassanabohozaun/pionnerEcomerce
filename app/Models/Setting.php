<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    protected $table = 'settings';
    protected $fillable = ['site_name', 'phone', 'whatsapp', 'address', 'description', 'keywords', 'email', 'email_support',
    'facebook', 'twitter', 'instegram', 'youtbe', 'logo', 'favicon'];
}

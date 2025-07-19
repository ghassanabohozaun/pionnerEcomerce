<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = ['user_id', 'name', 'email', 'phone', 'subject', 'message', 'is_read'];

    // relations
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // accessories
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i a');
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'contacts';
    protected $fillable = ['user_id', 'name', 'email', 'phone', 'subject', 'message', 'is_read', 'replay', 'is_replay', 'is_star'];

    // search in contact function
    static function searchContact($keyword)
    {
        return self::when(!empty($keyword), function ($query) use ($keyword) {
            $query->where('email', 'like', '%' . $keyword . '%');
        });
    }

    // relations
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // accessories
    // public function getCreatedAtAttribute($value)
    // {
    //     return Carbon::parse($value)->format('d/m/Y H:i a');
    // }
}

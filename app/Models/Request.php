<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'type',
        'date'
    ];

    public static function getRequests($user_id)
    {
        return self::where('user_id', $user_id)->get()->toArray();
    }
}

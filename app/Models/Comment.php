<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_name', 'email', 'home_page', 'captcha', 'text'
    ];

    protected $casts = [
        //'home_page' => 'nullable|url',
    ];

    public static $rules = [
       // 'home_page' => 'nullable|url',
    ];

}

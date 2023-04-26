<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'login',
        'password'
    ];

    protected static function booted()
    {
        static::created(function ($users) {
            $users->password = md5($users->password);
            $users->save();
        });
    }
}

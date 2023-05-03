<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class TempUsers extends Model implements IdentityInterface
{
    use HasFactory;

    protected $table = 'temp_users';
    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $fillable = [
        'name',
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

    public function findIdentity(int $id)
    {
        return self::where('id', $id)->first();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function attemptIdentity(array $credentials)
    {
        return self::where(['login' => $credentials['login'],
            'password' => md5($credentials['password'])])->first();
    }
}

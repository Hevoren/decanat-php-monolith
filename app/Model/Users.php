<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Src\Auth\IdentityInterface;

class Users extends Model implements IdentityInterface
{
    use HasFactory;

    protected $table = 'users';
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

    public function role():BelongsTo
    {
        return $this->belongsTo(Roles::class, 'role_id', 'role_id');
    }


    public function semestrDisciplines():BelongsTo
    {
        return $this->belongsTo(Semestrs::class, 'semestr_id', 'semestr_id');
    }
}

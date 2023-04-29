<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Semestrs extends Model
{
    protected $table = 'semestrs';

    protected $primaryKey = 'semestr_id';

    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'semestr'
    ];

    protected static function booted()
    {
        static::created(function ($group) {
            $group->save();
        });
    }
}
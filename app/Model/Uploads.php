<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Uploads extends Model
{
    protected $table = 'uploads';

    protected $primaryKey = 'upload_id';

    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'upload_name',
        'id'
    ];

    protected static function booted()
    {
        static::created(function ($group) {
            $group->save();
        });
    }
}
<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Controls extends Model
{
    protected $table = 'controls';

    protected $primaryKey = 'control_id';

    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
      'control_name'
    ];

    protected static function booted()
    {
        static::created(function ($group) {
            $group->save();
        });
    }
}
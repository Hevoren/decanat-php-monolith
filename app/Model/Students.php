<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Students extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'student_id';
    use HasFactory;
    public $timestamps = false;

    public function studentGroups():BelongsTo
    {
        return $this->belongsTo(Groups::class, 'group_id', 'group_id');
    }
}

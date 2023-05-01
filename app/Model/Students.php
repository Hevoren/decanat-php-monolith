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

    protected $fillable = [
        'name',
        'surname',
        'mid_name',
        'birth_date',
        'adress',
        'group_id'
    ];

    public function studentGroups():BelongsTo
    {
        return $this->belongsTo(Groups::class, 'group_id', 'group_id');
    }

    public function gradeCards()
    {
        return $this->hasMany(GradeCards::class, 'student_id', 'student_id');
    }

}

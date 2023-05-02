<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeCards extends Model
{

    protected $table = 'grade_card';
    protected $primaryKey = 'card_id';

    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'student_id',
        'discipline_id',
        'grade_id',
        'control_id',
        'hours'
    ];

    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id', 'student_id');
    }

    public function disciplines()
    {
        return $this->belongsTo(Disciplines::class, 'discipline_id', 'discipline_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grades::class, 'grade_id', 'grade_id');
    }

}
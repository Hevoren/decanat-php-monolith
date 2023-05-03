<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Groups extends Model
{
    protected $table = 'groups';
    protected $primaryKey = 'group_id';
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'group_name',
        'course_id',
        'speciality_id',
        'edcform_id'
    ];

    public function courses()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    public function specialities()
    {
        return $this->belongsTo(Specialities::class, 'speciality_id');
    }

    public function educationForms()
    {
        return $this->belongsTo(EducationForms::class, 'edcform_id');
    }

}

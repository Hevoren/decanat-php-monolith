<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PageGroups extends Model
{
    protected $table = 'groups';
    protected $primaryKey = 'group_id';
    use HasFactory;
    public $timestamps = false;

    public function courseGroup():BelongsTo
    {
        return $this->belongsTo(Courses::class, 'course_id', 'course_id');
    }
    public function educationGroup():BelongsTo
    {
        return $this->belongsTo(EducationForms::class, 'edcform_id', 'edcform_id');
    }
    public function specialityGroup():BelongsTo
    {
        return $this->belongsTo(Specialities::class, 'speciality_id', 'speciality_id');
    }

    public function groupDisc(): belongsToMany
    {
        return $this->belongsToMany(Disciplines::class, 'group_discipline',
            'group_id',
            'discipline_id');
    }
}

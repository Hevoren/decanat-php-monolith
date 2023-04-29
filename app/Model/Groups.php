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

    public function specialities()
    {
        return $this->belongsTo(Specialities::class, 'speciality_id');
    }

    public function educationForms()
    {
        return $this->belongsTo(EducationForms::class, 'edcform_id');
    }

}

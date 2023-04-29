<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationForm extends Model
{

    protected $table = 'education_forms';

    protected $primaryKey = 'edcform_id';

    use HasFactory;

    public $timestamps = false;

}
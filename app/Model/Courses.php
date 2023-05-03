<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{

    protected $table = 'courses';

    protected $primaryKey = 'course_id';

    use HasFactory;

    public $timestamps = false;

}
<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    protected $table = 'grades';
    protected $primaryKey = 'grade_id';

    use HasFactory;
    public $timestamps = false;

}
<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialities extends Model
{

    protected $table = 'specialities';

    protected $primaryKey = 'speciality_id';

    use HasFactory;

    public $timestamps = false;

}
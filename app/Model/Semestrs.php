<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestrs extends Model
{
    protected $table = 'semestrs';

    protected $primaryKey = 'semestr_id';

    use HasFactory;

    public $timestamps = false;

}
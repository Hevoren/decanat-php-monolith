<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplines extends Model
{
    protected $table = 'disciplines';

    use HasFactory;
    public $timestamps = false;
}

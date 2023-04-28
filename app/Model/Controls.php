<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Controls extends Model
{
    protected $table = 'controls';

    protected $primaryKey = 'control_id';

    use HasFactory;

    public $timestamps = false;

}
<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Disciplines extends Model
{
    protected $table = 'disciplines';
    protected $primaryKey = 'discipline_id';

    use HasFactory;

    public $timestamps = false;


}

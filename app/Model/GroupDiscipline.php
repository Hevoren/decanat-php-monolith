<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupDiscipline extends Model
{

    protected $table = 'group_discipline';

    protected $primaryKey = 'grdisc_id';

    use HasFactory;

    public $timestamps = false;

}
<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupDiscipline extends Model
{
    protected $table = 'group_discipline';

    protected $primaryKey = 'grdisc_id';

    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'group_id',
        'discipline_id'
    ];
}
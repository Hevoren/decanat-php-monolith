<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PageDisciplines extends Model
{
    protected $table = 'disciplines';

    protected $primaryKey = 'discipline_id';

    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'discipline_name',
        'group_name',
        'hours'
    ];

    public function controlDisciplines():BelongsTo
    {
        return $this->belongsTo(Controls::class, 'control_id', 'control_id');
    }
    public function semestrDisciplines():BelongsTo
    {
        return $this->belongsTo(Semestrs::class, 'semestr_id', 'semestr_id');
    }

    public function groupDisc(): belongsToMany
    {
        return $this->belongsToMany(Groups::class, 'group_discipline',
            'discipline_id',
            'group_id');
    }
}
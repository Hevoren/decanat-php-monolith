<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Src\Auth\IdentityInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupDisciplines extends Model
{
    protected $table = 'group_discipline';

    use HasFactory;

    public $timestamps = false;

    public function control(): BelongsTo
    {
        return $this->belongsTo(Controls::class, 'control_id');
    }

    public function semestr(): BelongsTo
    {
        return $this->belongsTo(Semestrs::class, 'semestr_id');
    }

}
<?php

namespace ESIK\Models\ESI;

use Illuminate\Database\Eloquent\Model;

class CharacterCorporationHistory extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'character_corporation_histories';
    public $incrementing = false;
    protected static $unguarded = true;

    protected $with = ['corporation'];

    protected $dates = [
        'start_date'
    ];

    public function corporation ()
    {
        return $this->hasOne(Corporation::class, 'id', 'corporation_id');
    }
}
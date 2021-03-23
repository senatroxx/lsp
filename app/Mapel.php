<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';

    protected $fillable = [
        'id', 'nama'
    ];

    public $timestamps = false;

    public $incrementing = false;
}

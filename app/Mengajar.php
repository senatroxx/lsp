<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    protected $table = 'mengajar';
    public $timestamps = false;
    protected $fillable = [
        'nip', 'id_mapel', 'id_kelas'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nis', 'password', 'nama', 'jk', 'alamat', 'id_kelas'
    ];

    protected $hidden = [
      'password'
    ];

    public $timestamps = false;

    protected $primaryKey = 'nis';

    public $incrementing = false;
}

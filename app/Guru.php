<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = [
      'nip', 'password', 'nama', 'jk', 'alamat'  
    ];

    protected $hidden = [
        'password'
    ];
    public $timestamps = false;
    
    protected $primaryKey = 'nip';
    
    public $incrementing = false;

}

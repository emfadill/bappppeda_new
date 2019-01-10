<?php

namespace App\Component\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'nik', 'name', 'username','password','jabatan','level',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

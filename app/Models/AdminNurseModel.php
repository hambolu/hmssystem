<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminNurseModel extends Model
{
    protected $fillable = [
        'name', 'email', 'password','address','avatar','admin','contact_no'
    ];
}

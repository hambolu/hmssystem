<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminHistoryModel extends Model
{
    protected $fillable = [
        'name', 'email', 'password','admin'
    ];
}

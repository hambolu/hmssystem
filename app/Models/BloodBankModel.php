<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodBankModel extends Model
{
    protected $fillable = [
        'blood_id', 'blood_group'
    ];
}
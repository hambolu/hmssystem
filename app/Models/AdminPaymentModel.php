<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPaymentModel extends Model
{
    protected $fillable=[
      'patient_name','amount','invoice'  ,
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeboardModel extends Model
{
    protected $fillable = [
        'title', 'notice','date'
    ];
}

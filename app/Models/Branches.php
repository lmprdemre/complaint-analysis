<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Branches extends Model
{
    protected $table = 'branches';
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'U';

    protected $fillable = [
        'id', 'name', 'keywords', 'c_count'
    ];
}

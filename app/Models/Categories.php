<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'U';

    protected $fillable = [
        'id', 'name', 'keywords', 'c_count'
    ];
}

<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class ProductModels extends Model
{
    protected $table = 'product_models';
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'U';

    protected $fillable = [
        'id', 'product_id', 'model_name', 'c_count'
    ];
}

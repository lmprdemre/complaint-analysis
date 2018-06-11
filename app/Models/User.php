<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use SoftDeletes;
    use Notifiable;

    protected $table = 'users';
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'U';

    protected $fillable = [
        'id', 'type', 'username', 'password', 'email', 'company_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

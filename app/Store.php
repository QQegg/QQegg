<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Store extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'id',
        'name',
        'contact',
        'account',
        'password',
        'phone',
        'address',
        'picture',
        'right',
        'expire',
    ];

    protected $table="stores";

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
}

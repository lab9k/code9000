<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'updated_at',
    ];

    /**
     * Get the votes for the current user.
     */
    public function votes()
    {
        return $this->hasMany('App\Vote');
    }

    public function providers()
    {
        return $this->hasMany('App\Provider');
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }
}

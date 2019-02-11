<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\UserSocialMediaAccount;

class AdminUser extends Authenticatable
{
    use Notifiable;

    protected $gaurd = 'admin';

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
        'password', 'remember_token',
    ];

    public function socialMediaAccounts() {
        return $this->hasMany('App\UserSocialMediaAccount', 'user_id', 'id');
    }

    public function getNameAttribute($name) {
        return ucwords($name);
    }
}

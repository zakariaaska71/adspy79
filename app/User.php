<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
 use Illuminate\Auth\Authenticatable;
 use Illuminate\Auth\Passwords\CanResetPassword;
 use Illuminate\Foundation\Auth\Access\Authorizable;
 use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
 use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Maklad\Permission\Traits\HasRoles;
use Laravel\Cashier\Billable;
use Alexzvn\LaravelMongoNotifiable\Notifiable;


class User extends Eloquent implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{

    use Notifiable,Authenticatable, Authorizable, CanResetPassword,HasRoles,Billable; 



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','country','type','paid','first_day','finish_day'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
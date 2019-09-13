<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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


    public function roles()
    {
        // this says A user can have many roles i.e student, admin, guest
        return $this->belongsToMany('App\Role');
    }

    /**
     * check for any role
     * @param array $roles
     */
    public function hasAnyRoles($roles)
    {
        // with the current user model ($this)->
        // check the belongs to many relationship roles()->
        // check to see if any $roles are in (whereIn) the 'title' column in the roles table
        // return true if any role found ->first()
        return null !== $this->roles()->whereIn('title', $roles)->first();
    }

    /**
     * check specific role is true
     * @param string $role
     */
    public function hasRole($role)
    {
        // with the current user model ($this)->
        // check the belongs to many relationship roles()->
        // check to see if $role are in (where) the 'title' column in the roles table
        return null !== $this->roles()->where('title', $role)->first();
    }
}

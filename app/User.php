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

    public function isAdmin()
    {
        return $this->roles()->where('title', 'Admin')->first();
    }

    /**
     * check for any role
     * @param array $roles
     */
    public function hasAnyRoles($roles)
    {
        // with the current user model ($this)->
        // check the belongs to many relationship roles()->
        // check to see if any $roles are in (whereIn) the 'name' column in the roles table
        // return true if any role found ->first()
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
     * check specific role is true
     * @param string $role admin, user ....
     * ----------------------------------------------------------------------
     * [current user]($this)->[relationship]roles()->
     * [return true where name = $role]->where('name', $role)
     * check to see if $role are in (where) the 'name' column in the roles table
     */
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->first();
    }

    /**
     * Get the address related with the user
     */
    public function address()
    {
        return $this->hasOne('App\Address');
    }
}

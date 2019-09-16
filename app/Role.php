<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Role extends Model
{
    public function users()
    {
        // this says a role can have many users
        return $this->belongsToMany(User::class);
    }
}

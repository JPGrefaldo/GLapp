<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
<<<<<<< HEAD
=======
use Spatie\Permission\Traits\HasRoles;
>>>>>>> d82a395ca31c4d8d88e270ce733240cdf179fd1f

class User extends Authenticatable
{
    use Notifiable;
<<<<<<< HEAD
=======
    use HasRoles;
>>>>>>> d82a395ca31c4d8d88e270ce733240cdf179fd1f

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
<<<<<<< HEAD
=======

>>>>>>> d82a395ca31c4d8d88e270ce733240cdf179fd1f
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
}

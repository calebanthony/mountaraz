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
        'password', 'remember_token',
    ];

    /**
     * The many-to-many relationship between users and votes on tips
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tipVotes()
    {
        return $this->belongsToMany('App\TipVotes');
    }
}

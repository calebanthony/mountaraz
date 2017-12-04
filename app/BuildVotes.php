<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuildVotes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['build_id', 'user_id', 'value'];
}

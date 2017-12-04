<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipVotes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tip_id', 'user_id', 'value'];
}

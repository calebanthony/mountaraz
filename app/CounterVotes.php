<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CounterVotes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['counter_id', 'user_id', 'value'];
}

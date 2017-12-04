<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * A tip may have votes from many different users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function votes()
    {
        return $this->hasMany('App\TipVotes');
    }

    /**
     * A tip is specific to a champion.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function championDetails()
    {
        return $this->belongsTo('App\Champion', 'champion', 'name');
    }
}

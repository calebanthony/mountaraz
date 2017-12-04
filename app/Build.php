<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Battlerite;

class Build extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * A build may have votes from many different users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function votes()
    {
        return $this->hasMany('App\BuildVotes');
    }

    /**
     * Returns the full battlerite details
     */
    public function getBattleritesAttribute()
    {
        return [
            Battlerite::find($this->battlerite_1),
            Battlerite::find($this->battlerite_2),
            Battlerite::find($this->battlerite_3),
            Battlerite::find($this->battlerite_4),
            Battlerite::find($this->battlerite_5),
        ];
    }
}

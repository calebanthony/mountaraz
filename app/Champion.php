<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Champion extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the abilities associated with this champion
     */
    public function abilities()
    {
        return $this->hasMany('App\Ability');
    }

    /**
     * Get a single ability associated with a champion.
     * EX: ->ability('Q') or ->ability('EX2')
     */
    public function ability($ability)
    {
        // Handle the EX abilities by searching for the '+' character
        // Then handle the normal ability hotkeys
        // And finally, if those don't match, match the ability name
        if ($ability === 'EX1') {
            return $this->abilities()->where('hotkey', 'LIKE', '% + %')->get()[0];
        } elseif ($ability === 'EX2') {
            return $this->abilities()->where('hotkey', 'LIKE', '% + %')->get()[1];
        } elseif ($ability === 'Q' || $ability === 'E' || $ability === 'R' || $ability === 'F' || $ability === 'LMB' || $ability === 'RMB' || $ability === 'SPACE') {
            return $this->abilities()->where('hotkey', $ability)->first();
        } else {
            return $this->abilities()->where('name', $ability)->first();
        }
    }
    
    /**
     * Get the battlerites associated with this champion
     */
    public function battlerites()
    {
        return $this->hasMany('App\Battlerite');
    }

    /**
     * Get a set of battlerites based on a specific ability.
     * EX: ->battlerite('Q') or ->battlerite('EX2')
     */
    public function battlerite($ability)
    {
        $skill = $this->ability($ability);

        return $this->battlerites()->where('skill', $skill->name)->get();
    }

    /**
     * Get the portrait image URI for a champion
     */
    public function getPortraitAttribute()
    {
        $lowerName = strtolower($this->name);
        return "/images/{$lowerName}/portrait.png";
    }

    /**
     * Get the full profile image URI for a champion
     */
    public function getProfileAttribute()
    {
        $lowerName = strtolower($this->name);
        return "/images/{$lowerName}/profile.png";
    }
}

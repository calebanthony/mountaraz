<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Champion;
use App\Ability;

class Battlerite extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Data points that are hidden when the model is called
     *
     * @var array
     */
    protected $hidden = ['id', 'created_at', 'updated_at'];

    /**
     * Get the image URI for the ability the battlerite affects
     */
    public function getImageAttribute()
    {
        $lowerName = preg_replace('/\s+/', '', strtolower($this->skill));
        $championName = Champion::where('id', $this->champion_id)->first()->name;
        return "/images/{$championName}/{$lowerName}.png";
    }

    /**
     * Get the hotkey of the ability atached to the battlerite.
     */
    public function getHotkeyAttribute()
    {
        $ability = Ability::where('name', $this->skill)->first();
        return $ability->hotkey;
    }
}

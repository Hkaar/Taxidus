<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameSession extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'game_sessions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'password',
    ];

    /**
     * Define the relationship between game sessions with session data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function data()
    {
        return $this->hasMany(SessionData::class, 'session_id', 'id');
    }

    /**
     * Define the relationship between game sessions with session players
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function players()
    {
        return $this->hasMany(Player::class, 'session_id', 'id');
    }

    /**
     * Define the relationship between game sessions with biomes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function biomes()
    {
        return $this->belongsToMany(Biome::class, 'session_biomes');
    }

    /**
     * Define the relationship between game sessions with objects
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items()
    {
        return $this->belongsToMany(GameObject::class, 'session_objects');
    }
}

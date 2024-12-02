<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameSession extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'game_sessions';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'code',
        'password',
    ];

    /**
     * Define the relationship between game sessions with session data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<SessionData, covariant GameSession>
     */
    public function data()
    {
        return $this->hasMany(SessionData::class, 'session_id', 'id');
    }

    /**
     * Define the relationship between game sessions with session players
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Player, covariant GameSession>
     */
    public function players()
    {
        return $this->hasMany(Player::class, 'session_id', 'id');
    }

    /**
     * Define the relationship between game sessions with biomes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Biome, covariant GameSession>
     */
    public function biomes()
    {
        return $this->belongsToMany(Biome::class, 'session_biomes');
    }

    /**
     * Define the relationship between game sessions with objects
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<GameObject, covariant GameSession>
     */
    public function items()
    {
        return $this->belongsToMany(GameObject::class, 'session_objects');
    }
}

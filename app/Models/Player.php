<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'session_players';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'session_id',
        'role_id',
    ];

    /**
     * Define the relationship between players with user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, covariant Player>
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Define the relationship between players with sessions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<GameSession, covariant Player>
     */
    public function session()
    {
        return $this->belongsTo(GameSession::class, 'session_id', 'id');
    }

    /**
     * Define the relationship between players with player inventory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<PlayerInventory, covariant Player>
     */
    public function items()
    {
        return $this->hasMany(PlayerInventory::class, 'player_id', 'id');
    }

    /**
     * Define the relationship between players with player data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<PlayerData, covariant Player>
     */
    public function data()
    {
        return $this->hasMany(PlayerData::class, 'player_id', 'id');
    }

    /**
     * Define the relationship between players with player stats
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<PlayerStat, covariant Player>
     */
    public function stats()
    {
        return $this->hasMany(PlayerStat::class, 'player_id', 'id');
    }

    /**
     * Define the relationship with session roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<SessionRole, covariant Player>
     */
    public function role()
    {
        return $this->belongsTo(SessionRole::class, 'role_id', 'id');
    }
}

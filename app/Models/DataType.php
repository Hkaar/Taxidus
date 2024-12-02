<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class DataType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'data_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Define the relationship between data types with entity data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Entity, covariant DataType>
     */
    public function entityData()
    {
        return $this->hasMany(Entity::class, 'data_type_id', 'id');
    }

    /**
     * Define the relationship between data types with session data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<GameSession, covariant DataType>
     */
    public function sessionData()
    {
        return $this->hasMany(GameSession::class, 'data_type_id', 'id');
    }

    /**
     * Define the relationship between data types with player stats
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<PlayerStat, covariant DataType>
     */
    public function playerStats()
    {
        return $this->hasMany(PlayerStat::class, 'data_type_id', 'id');
    }

    /**
     * Define the relationship between data types with player data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<PlayerData, covariant DataType>
     */
    public function playerData()
    {
        return $this->hasMany(PlayerData::class, 'data_type_id', 'id');
    }

    /**
     * Scope a query strictly by the given name
     *
     * @return Builder
     */
    public function scopeStrictByName(Builder $query, string $name)
    {
        return $query->where('name', '=', $name);
    }
}

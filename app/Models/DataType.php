<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataType extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public string $table = "data_types";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Define the relationship between data types with entity data
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entityData()
    {
        return $this->hasMany(Entity::class, 'data_type_id', 'id');
    }

    /**
     * Define the relationship between data types with session data
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sessionData()
    {
        return $this->hasMany(GameSession::class,'data_type_id','id');
    }

    /**
     * Define the relationship between data types with player stats
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function playerStats()
    {
        return $this->hasMany(PlayerStat::class,'data_type_id','id');
    }

    /**
     * Define the relationship between data types with player data
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function playerData()
    {
        return $this->hasMany(PlayerData::class,'data_type_id','id');
    }

    /**
     * Scope a query strictly by the given name
     * 
     * @param \Illuminate\Contracts\Database\Eloquent\Builder $query
     * @param string $name
     * @return Builder
     */
    public function scopeStrictByName(Builder $query, string $name)
    {
        return $query->where('name', '=', $name);
    }
}

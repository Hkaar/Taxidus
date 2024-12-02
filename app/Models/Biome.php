<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biome extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'biomes';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Define the relationship between biomes with entities
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Entity, covariant Biome>
     */
    public function entities()
    {
        return $this->belongsToMany(Entity::class, 'biome_entities');
    }

    /**
     * Define the relationship between biomes with objects
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<GameObject, covariant Biome>
     */
    public function objects()
    {
        return $this->belongsToMany(GameObject::class, 'biome_objects');
    }

    /**
     * Define the relationship between biomes with sessions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<GameSession, covariant Biome>
     */
    public function sessions()
    {
        return $this->belongsToMany(GameSession::class, 'session_biomes');
    }
}

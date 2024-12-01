<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'entities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'desc',
        'role_id',
    ];

    /**
     * Define the relationship between entities with biomes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function biomes()
    {
        return $this->belongsToMany(Biome::class, 'biome_entities');
    }

    /**
     * Define the relationship between entities with objects
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items()
    {
        return $this->belongsToMany(GameObject::class, 'entity_inventory');
    }

    /**
     * Define the relationship between entities with entity data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function data()
    {
        return $this->hasMany(EntityData::class, 'entity_id', 'id');
    }

    /**
     * Define the relationship between entity with entity roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(EntityRole::class, 'role_id', 'id');
    }
}

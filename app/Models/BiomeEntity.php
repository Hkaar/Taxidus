<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiomeEntity extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'biome_entities';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'biome_id',
        'entity_id',
        'encounter_rate',
    ];

    /**
     * Define the relationship between biome entities with entities
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Entity, covariant BiomeEntity>
     */
    public function entity()
    {
        return $this->belongsTo(Entity::class, 'entity_id', 'id');
    }

    /**
     * Define the relationship between biome entities with biome
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Biome, covariant BiomeEntity>
     */
    public function biome()
    {
        return $this->belongsTo(Biome::class, 'biome_id', 'id');
    }
}

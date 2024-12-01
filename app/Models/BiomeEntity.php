<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiomeEntity extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'biome_entities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'biome_id',
        'entity_id',
        'encounter_rate',
    ];

    /**
     * Define the relationship between biome entities with entities
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity()
    {
        return $this->belongsTo(Entity::class, 'entity_id', 'id');
    }

    /**
     * Define the relationship between biome entities with biome
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function biome()
    {
        return $this->belongsTo(Biome::class, 'biome_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameObject extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = "biomes";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'object_type_id',
        'weight',
    ];

    /**
     * Define the relationship between objects with object types
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(ObjectType::class, 'object_type_id', 'id');
    }

    /**
     * Define the relationship between objects with object data
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function data()
    {
        return $this->hasMany(ObjectData::class, 'object_id', 'id');
    }

    /**
     * Define the relationship between objects with player inventory
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function playerInventory()
    {
        return $this->hasMany(PlayerInventory::class,'object_id', 'id');
    }

    /**
     * Define the relationship between objects with entity inventory
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entityInventory()
    {
        return $this->hasMany(EntityInventory::class, 'object_id', 'id');
    }

    /**
     * Define the relationship between objects with biomes
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function biomes()
    {
        return $this->belongsToMany(Biome::class, 'biome_objects');
    }

    /**
     * Define the relationship between objects with sessions
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sessions()
    {
        return $this->belongsToMany(GameSession::class, 'session_objects');
    }
}

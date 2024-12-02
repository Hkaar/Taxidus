<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntityInventory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'entity_inventory';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'entity_id',
        'object_id',
        'drop_rate',
        'amount',
    ];

    /**
     * Define the relationship between entity inventory with entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Entity, covariant EntityInventory>
     */
    public function entity()
    {
        return $this->belongsTo(Entity::class, 'entity_id', 'id');
    }

    /**
     * Define the relationship between entity inventory with objects
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<GameObject, covariant EntityInventory>
     */
    public function item()
    {
        return $this->belongsTo(GameObject::class, 'object_id', 'id');
    }
}

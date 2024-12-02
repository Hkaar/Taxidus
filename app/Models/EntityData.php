<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntityData extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'entity_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'entity_id',
        'data_type_id',
        'name',
        'value',
    ];

    /**
     * Define the relationship between entity data with data types
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<DataType, covariant EntityData>
     */
    public function type()
    {
        return $this->belongsTo(DataType::class, 'data_type_id', 'id');
    }

    /**
     * Define the relationship between entity data with entities
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Entity, covariant EntityData>
     */
    public function entity()
    {
        return $this->belongsTo(Entity::class, 'entity_id', 'id');
    }
}

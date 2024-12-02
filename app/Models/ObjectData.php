<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjectData extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'object_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'object_id',
        'name',
        'value',
        'data_type_id',
    ];

    /**
     * Define the relationship between object data with objects
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<GameObject, covariant ObjectData>
     */
    public function object()
    {
        return $this->belongsTo(GameObject::class, 'object_id', 'id');
    }

    /**
     * Define the relationship between object data with data types
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<DataType, covariant ObjectData>
     */
    public function type()
    {
        return $this->belongsTo(DataType::class, 'data_type_id', 'id');
    }
}

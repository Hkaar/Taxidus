<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ObjectType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'object_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Define the relationship between object types with objects
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<GameObject, covariant ObjectType>
     */
    public function objects()
    {
        return $this->hasMany(GameObject::class, 'object_type_id', 'id');
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

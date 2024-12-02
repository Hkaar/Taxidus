<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class EntityRole extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'entity_roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Define the relationship between entity roles with entities
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Entity, covariant EntityRole>
     */
    public function entities()
    {
        return $this->hasMany(Entity::class, 'role_id', 'id');
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

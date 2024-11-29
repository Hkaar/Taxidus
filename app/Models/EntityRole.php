<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityRole extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public string $table = "entity_roles";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Define the relationship between entity roles with entities
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entities()
    {
        return $this->hasMany(Entity::class, 'role_id', 'id');
    }

    /**
     * Scope a query strictly by the given name
     * 
     * @param \Illuminate\Contracts\Database\Eloquent\Builder $query
     * @param string $name
     * @return Builder
     */
    public function scopeStrictByName(Builder $query, string $name)
    {
        return $query->where('name', '=', $name);
    }
}

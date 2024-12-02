<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SessionRole extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'session_roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Define the relationship with session players
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Player, covariant SessionRole>
     */
    public function players()
    {
        return $this->hasMany(Player::class, 'role_id', 'id');
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerInventory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'player_inventory';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'player_id',
        'object_id',
        'amount',
    ];

    /**
     * Define the relationship between player inventory with players
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Player, covariant PlayerInventory>
     */
    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id', 'id');
    }

    /**
     * Define the relationship between players with objects
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<GameObject, covariant PlayerInventory>
     */
    public function item()
    {
        return $this->belongsTo(GameObject::class, 'object_id', 'id');
    }
}

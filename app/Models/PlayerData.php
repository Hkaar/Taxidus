<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerData extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'player_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'player_id',
        'name',
        'value',
        'data_type_id',
    ];

    /**
     * Define the relationship between player data with player
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Player, covariant PlayerData>
     */
    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id', 'id');
    }

    /**
     * Define the relationship between player data with data types
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<DataType, covariant PlayerData>
     */
    public function type()
    {
        return $this->belongsTo(DataType::class, 'data_type_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerStat extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'player_stats';

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
     * Define the relationship between player stats with player
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Player, covariant PlayerStat>
     */
    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id', 'id');
    }

    /**
     * Define the relationship between player stats with data types
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<DataType, covariant PlayerStat>
     */
    public function type()
    {
        return $this->belongsTo(DataType::class, 'data_type_id', 'id');
    }
}

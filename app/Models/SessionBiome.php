<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionBiome extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'session_biomes';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'biome_id',
        'session_id',
        'coverage',
    ];

    /**
     * Define the relationship with biomes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Biome, covariant SessionBiome>
     */
    public function biome()
    {
        return $this->belongsTo(Biome::class, 'biome_id', 'id');
    }

    /**
     * Define the relationship with sessions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<GameSession, covariant SessionBiome>
     */
    public function session()
    {
        return $this->belongsTo(GameSession::class, 'session_id', 'id');
    }
}

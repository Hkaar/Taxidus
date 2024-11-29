<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionBiome extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = "session_biomes";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'biome_id',
        'session_id',
        'coverage',
    ];

    /**
     * Define the relationship with biomes
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function biome()
    {
        return $this->belongsTo(Biome::class, 'biome_id', 'id');
    }

    /**
     * Define the relationship with sessions
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function session()
    {
        return $this->belongsTo(GameSession::class,'session_id','id');
    }
}

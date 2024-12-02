<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionData extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'session_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'session_id',
        'name',
        'value',
        'data_type_id',
    ];

    /**
     * Define the relationship with sessions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<GameSession, covariant SessionData>
     */
    public function session()
    {
        return $this->belongsTo(GameSession::class, 'session_id', 'id');
    }

    /**
     * Define the relationship with data types
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<DataType, covariant SessionData>
     */
    public function type()
    {
        return $this->belongsTo(DataType::class, 'data_type_id', 'id');
    }
}

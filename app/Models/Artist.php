<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birthdate',
        'bio',
        'is_singer',
        'favorite_instrument_id',
    ];

    /**
     * Get the instrument that owns the Artist
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instrument(): BelongsTo
    {
        return $this->belongsTo(Instrument::class, 'favorite_instrument_id', 'id');
    }

}

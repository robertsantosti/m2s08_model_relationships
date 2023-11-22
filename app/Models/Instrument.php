<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * Get the user that owns the Instrument
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class, 'favorite_instrument_id');
    }
}

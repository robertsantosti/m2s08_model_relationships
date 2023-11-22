<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     * Get the user associated with the Artist
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function instrument(): HasOne
    {
        return $this->hasOne(Instrument::class, 'id', 'favorite_instrument_id');
    }
}

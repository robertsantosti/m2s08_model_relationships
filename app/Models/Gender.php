<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gender extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * Get the bands that owns the Gender
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bands(): BelongsTo
    {
        return $this->belongsTo(Band::class);
    }
}

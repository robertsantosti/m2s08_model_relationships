<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Band extends Model
{
    use HasFactory;

    protected array $fillable = ["name","gender_id","description"];
    protected array $hidden = ["gender_id"];

    /**
     * Get the gender associated with the Band
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function gender(): HasOne
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }
}

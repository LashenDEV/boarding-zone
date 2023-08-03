<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservedBoardingPlaces extends Model
{
    use HasFactory;

    protected $fillable = [
        'boarder_id',
        'boarding_place_id',
    ];

    public function boarders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class, 'id', 'boarder_id');
    }
}

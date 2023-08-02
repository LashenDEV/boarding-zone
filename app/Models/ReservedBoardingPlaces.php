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
}

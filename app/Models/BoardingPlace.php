<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardingPlace extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'thumbnail',
        'price',
        'number_of_rooms',
        'target_audience',
        'availability',
        'payment_method',
        'latitude',
        'longitude',
        'features',
        'publish_status',
        'is_reserved',
        'bowner_id',
    ];
}

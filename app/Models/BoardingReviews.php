<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardingReviews extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'rating',
        'comment',
        'status',
        'boarding_id'
    ];
}

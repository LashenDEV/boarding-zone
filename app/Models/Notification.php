<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'icon',
        'bowner_id',
        'boarding_id',
        'message',
        'seenByBowner',
        'seenByAdmin',
        'seenBySdmin'
    ];
}

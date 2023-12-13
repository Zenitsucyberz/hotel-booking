<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelRoom extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'room_label',
        'room_count',
        'hotel_room_category_id',
        'price',
    'status',
        'image',
        'maximum_guests',
        'beds',
    ];
}

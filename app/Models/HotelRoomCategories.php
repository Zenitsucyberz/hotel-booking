<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelRoomCategories extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'name',
        'business_id',
        'status',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'business_type',
        'name',
        'logo',
        'address1',
        'address2',
        'address3',
        'zipcode',
        'city',
        'country',
        'is_active',
        'ratings'

    ];
}

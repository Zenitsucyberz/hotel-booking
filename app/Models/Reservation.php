<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable=[
         'reservable_type',
            'reservable_id',
            'invoice_no'   ,
            'business_id'  ,
            'customer_id',
            'hotel_room_id' ,
            'check_in_date',
            'check_out_date',
            'guest_count',
            'adults',
            'children',
            'total_amount',
            'discount_type',
            'discount_amount',
            'taxable_amount',
            'tax_id' ,
            'sgst_amount',
            'cgst_amount',
            'igst_amount',
            'tax_amount',
            'round_off_amount',
            'net_total_amount',
            'reservation_status',
            'payment_status',
            'payment_method',
            'booking_date',
            'check_in_time',
            'check_out_time',
            'is_confirmed',
            'customer_notes',
            'staff_notes',
            'additional_notes',
            'created_by',
            'updated_by',
    ];

   



    public function  customer()
    {


        return $this->belongsTo(Customer::class);
    }

    public function room()
    {
        return $this->belongsTo(HotelRoom::class,'hotel_room_id');
    }


    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}

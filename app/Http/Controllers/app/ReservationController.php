<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Customer;
use App\Models\HotelCustomer;
use App\Models\HotelReservation;
use App\Models\HotelRoom;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('app.reservations.index',['reservations' => $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $businesses = Business::all();
        $customers = Customer::all();
        $rooms = HotelRoom::all();
        $users = User::all();
        return view('app.reservations.create',['businesses' => $businesses, 'customers' => $customers,'rooms' => $rooms,'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            // 'reservable_type' => ['required','string'],
            // 'reservable_id' => ['required','integer'],
            // 'invoice_no'    => ['required','string'],
            // 'business_id'   => ['required','integer'],
            'customer_id' => ['required','integer'],
            'hotel_room_id'  => ['required','integer'],
            // 'check_in_date' => ['required','date'],
            // 'check_out_date' => ['required','date'],
            'guest_count' => ['required','integer'],
            // 'total_amount' => ['required','integer'],
            'discount_type' => ['required','string'],
            'discount_amount' => ['required','integer'],
            // 'taxable_amount' => ['required','integer'],
            'tax_id'  => ['required','integer'],
            
            'tax_amount' => ['required','integer'],
            'round_off_amount' => ['required','integer'],
            'net_total_amount' => ['required','integer'],
            'reservation_status' => ['required','string'],
            'payment_status' => ['required','string'],
            'payment_method' => ['required','string'],
            'booking_date' => ['required'],
            'check_in_time' => ['required'],
            'check_out_time' => ['required'],
            'is_confirmed' => ['required','integer'],
            'customer_notes' => ['nullable','string'],
            'staff_notes' => ['nullable','string'],
            'additional_notes' => ['nullable','string'],
            

        ]);



        $invoiceNo = 10040;

        $input['reservable_type']='App\Models\HotelRoom';
        $input['reservable_id']=$input['hotel_room_id'];
        $input['invoice_no']=uniqid();
        $input['created_by']=auth()->user()->id;

        $input['taxable_amount'] = 100;
        $input['sgst_amount'] = 100;
        $input['cgst_amount'] = 100;
        $input['igst_amount'] = 100;

        $input['total_amount'] = 100;



        $reservation = Reservation::create($input);
        $reservation->invoice_no = 'INV-'.($invoiceNo + $reservation->id);
        $reservation->save();

        return redirect()->route('reservations.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('app.reservations.index', ['reservations' => $reservations]);
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
        return view('app.reservations.create', ['businesses' => $businesses, 'customers' => $customers, 'rooms' => $rooms, 'users' => $users]);
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
            'customer_id' => ['required', 'integer'],
            'hotel_room_id'  => ['required', 'integer'],
            // 'check_in_date' => ['required','date'],
            // 'check_out_date' => ['required','date'],
            'guest_count' => ['required', 'integer'],
            // 'total_amount' => ['required','integer'],
            'discount_type' => ['required', 'string'],
            'discount_amount' => ['required', 'integer'],
            // 'taxable_amount' => ['required','integer'],
            'tax_id'  => ['required', 'integer'],

            'tax_amount' => ['required', 'integer'],
            'round_off_amount' => ['required', 'integer'],
            'net_total_amount' => ['required', 'integer'],
            'reservation_status' => ['required', 'string'],
            'payment_status' => ['required', 'string'],
            'payment_method' => ['required', 'string'],
            'booking_date' => ['required'],
            'check_in_time' => ['required'],
            'check_out_time' => ['required'],
            'is_confirmed' => ['required', 'integer'],
            'customer_notes' => ['nullable', 'string'],
            'staff_notes' => ['nullable', 'string'],
            'additional_notes' => ['nullable', 'string'],


        ]);



        $invoiceNo = 10040;

        $input['reservable_type'] = 'App\Models\HotelRoom';
        $input['reservable_id'] = $input['hotel_room_id'];
        $input['invoice_no'] = uniqid();
        $input['created_by'] = auth()->user()->id;

        $input['taxable_amount'] = 100;
        $input['sgst_amount'] = 100;
        $input['cgst_amount'] = 100;
        $input['igst_amount'] = 100;

        $input['total_amount'] = 100;



        $reservation = Reservation::create($input);
        $reservation->invoice_no = 'INV-' . ($invoiceNo + $reservation->id);
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
        // $input = $request->validate([
        //     // 'reservable_type' => ['required','string'],
        //     // 'reservable_id' => ['required','integer'],
        //     // 'invoice_no'    => ['required','string'],
        //     // 'business_id'   => ['required','integer'],
        //     'customer_id' => ['required', 'integer'],
        //     'hotel_room_id'  => ['required', 'integer'],
        //     // 'check_in_date' => ['required','date'],
        //     // 'check_out_date' => ['required','date'],
        //     'guest_count' => ['required', 'integer'],
        //     // 'total_amount' => ['required','integer'],
        //     'discount_type' => ['required', 'string'],
        //     'discount_amount' => ['required', 'integer'],
        //     // 'taxable_amount' => ['required','integer'],
        //     'tax_id'  => ['required', 'integer'],

        //     'tax_amount' => ['required', 'integer'],
        //     'round_off_amount' => ['required', 'integer'],
        //     'net_total_amount' => ['required', 'integer'],
        //     'reservation_status' => ['required', 'string'],
        //     'payment_status' => ['required', 'string'],
        //     'payment_method' => ['required', 'string'],
        //     'booking_date' => ['required'],
        //     'check_in_time' => ['required'],
        //     'check_out_time' => ['required'],
        //     'is_confirmed' => ['required', 'integer'],
        //     'customer_notes' => ['nullable', 'string'],
        //     'staff_notes' => ['nullable', 'string'],
        //     'additional_notes' => ['nullable', 'string'],


        // ]);



        // $invoiceNo = 10040;

        // $input['reservable_type'] = 'App\Models\HotelRoom';
        // $input['reservable_id'] = $input['hotel_room_id'];
        // $input['invoice_no'] = uniqid();
        // $input['created_by'] = auth()->user()->id;

        // $input['taxable_amount'] = 100;
        // $input['sgst_amount'] = 100;
        // $input['cgst_amount'] = 100;
        // $input['igst_amount'] = 100;

        // $input['total_amount'] = 100;



        // $reservation = Reservation::create($input);
        // $reservation->invoice_no = 'INV-' . ($invoiceNo + $reservation->id);
        // $reservation->update($input);
        // return redirect()->route('reservations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return response()->json(['message' => 'Reservation Deleted Successfully']);
    }

    public function checkRoomAvailability(Request $request)
    {

        $room = HotelRoom::where('id', $request->room_id)->first();
        $startDate = $request->check_in_time;
        $endDate = $request->check_out_time;
        $booking = Reservation::where('hotel_room_id', $room->id)
            ->where(function ($query) use ($startDate, $endDate) {

                $query->where(function ($where1) use ($startDate) {
                    $where1->where('check_in_time', '<=', Carbon::parse($startDate))
                        ->where('check_out_time', '>=', Carbon::parse($startDate));
                });


                $query->orwhere(function ($where2) use ($endDate) {

                    $where2->where('check_in_time', '<=', Carbon::parse($endDate))
                        ->where('check_out_time', '>=', Carbon::parse($endDate));
                });
            })
            ->count();

        if ($booking < $room->room_count) {

            $data['current_bookings'] = $booking;

            $rent = $room->rate * $request->guest_count;
            $data['rent'] = $rent;
            // room rent

            // discount amount
            $discountAmount = 0;
            if ($request->has('discount_type') && $request->discount_amount > 0) {
                if ($request->discount_type == 'percentage') {
                    $discountAmount = ($request->discount_amount / 100) * $rent;
                } else {
                    $discountAmount = $request->discount_amount;
                }
            }

            $discountedAmount = $rent - $discountAmount;
            $data['discounted_amount'] = $discountedAmount;
            // discount amount

            // tax

            $taxAmount = 0;
            $taxRate = 12;
            $sgstAmount = $cgstAmount = 0;
            if ($request->has('tax_id')) {
                $taxAmount = ($taxRate / 100) * $discountedAmount;
            }
            if ($taxAmount > 0) {
                $sgstAmount = $taxAmount / 2;
                $cgstAmount = $sgstAmount;
            }
            $taxedAmount = $taxAmount + $discountedAmount;
            $data['taxes'] = $taxedAmount;
            $data['sgst'] = round($sgstAmount, 2);
            $data['cgst'] = round($cgstAmount, 2);

            $roomName = $room->room_label;
            $data['roomName'] = $roomName;

            $discountableAmount = $rent - $discountedAmount;
            $data['discountableAmount'] = $discountableAmount;

            return response()->json(['success' => true, 'data' => $data]);
        } else {
            return response()->json(['success' => false, 'message' => 'no room available']);
        }
    }


    public function getDataTableData()
    {

        $reservations = DB::table('reservations')->join('hotel_rooms', 'reservations.hotel_room_id', '=', 'hotel_rooms.id')
            ->join('customers', 'reservations.customer_id', '=', 'customers.id')
            ->select('reservations.*', 'hotel_rooms.room_label', 'customers.customer_name')
            ->get();

        return datatables()::of($reservations)
            ->addIndexColumn()
            ->addColumn('is_confirmed', function ($row) {

                if ($row->is_confirmed == 1) {
                    return "confirmed";
                } else {
                    return "Not Confirmed";
                }
            })
            ->addColumn('actions', function ($reservation) {
                return '
                            
                            <button class="delete-button" data-action="' . route('reservations.destroy', $reservation->id) . '">Delete</button>
                        ';
            })
            ->rawColumns(['actions'])
            ->make();
    }
}

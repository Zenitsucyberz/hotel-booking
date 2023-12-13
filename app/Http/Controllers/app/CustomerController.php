<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\HotelCustomer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = HotelCustomer::all();
        return view('app.customer.index',['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $input = $request->validate([
        'customer_name' => ['required','string'],
        'customer_address1' => ['required','string'],
        'customer_address2' => ['required','string'],
        'city' => ['required','string'],
        'state' => ['required','string'],
        'pincode' => ['required','integer'],
        'phone' => ['required','integer']

        
       ]);
       HotelCustomer::create($input);
       return redirect()->route('customers.index');
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
    public function edit(HotelCustomer $customer)
    {
        return view('app.customer.edit',['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelCustomer $customer)
    {
        $input = $request->validate([
            'customer_name' => ['required','string'],
            'customer_address1' => ['required','string'],
            'customer_address1' => ['required','string'],
            'city' => ['required','string'],
            'state' => ['required','string'],
            'pincode' => ['required','integer'],
            'phone' => ['required','integer']
    
            
           ]);
           $customer->update($input);
           return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelCustomer $customer)
    {
        $customer->delete();
        return response()->json(['message' => 'Customer Deleted Successfully']);
    }
}

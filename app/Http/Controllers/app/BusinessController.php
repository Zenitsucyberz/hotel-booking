<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businesses = Business::all();
        return view('app.business.index', ['businesses' => $businesses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.business.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $input = $request->validate([
            'business_type' => ['required', 'string'],
            'name'          => ['required', 'string'],
            'logo'          => ['nullable', 'string'],
            'address1'      => ['required', 'string'],
            'address2'      => ['nullable', 'string'],
            'address3'      => ['nullable', 'string'],
            'zipcode'       => ['required', 'integer'],
            'city'          => ['required', 'string'],
            'country'       => ['required', 'string'],
            'is_active'     => ['required', 'boolean'],
            'ratings'       => ['required'],

        ]);

        Business::create($input);
        return redirect()->route('business.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business)
    {
        return view('app.business.edit', ['business' => $business]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Business $business)
    {
        $input = $request->validate([
            'business_type' => ['required', 'string'],
            'name'          => ['required', 'string'],
            'logo'          => ['nullable', 'string'],
            'address1'      => ['required', 'string'],
            'address2'      => ['nullable', 'string'],
            'address3'      => ['nullable', 'string'],
            'zipcode'       => ['required', 'integer'],
            'city'          => ['required', 'string'],
            'country'       => ['required', 'string'],
            'is_active'     => ['required', 'boolean'],
            'ratings' => ['required']

        ]);



        $business->update($input);
        return redirect()->route('business.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $business)
    {

        $business->delete();
        return response()->json(['message' => 'Business deleted successfully']);
        
    }
}

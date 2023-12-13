<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\HotelRoomCategories;
use Illuminate\Http\Request;
class RoomCategoryController extends Controller
{
    //

    public function index()
    {
        $room_categories = HotelRoomCategories::all();

        
        return view('app.roomCategories.index',['room_categories'=>$room_categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $businesses = Business::all();
        return view('app.roomCategories.create',['businesses' => $businesses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => ['required', 'string'],
            'business_id' =>['required','integer'],
            'status' => ['required', 'integer'],
        ]);
        HotelRoomCategories::create($input);
        return redirect()->route('roomcategories.index');
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
    public function edit(HotelRoomCategories $roomcategory)
    {
        return view('app.roomCategories.edit',['roomcategory' => $roomcategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelRoomCategories $roomcategory)
    {
        $input = $request->validate([
            'name' => ['required', 'string'],
            'business_id' =>['required','integer'],
            'status' => ['required', 'integer'],
        ]);
        $roomcategory->update($input);
        return redirect()->route('roomcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelRoomCategories $roomcategory)
    {
    
        $roomcategory->delete();
        return response()->json(['message' => 'Category deleted successfully']);

    }
}

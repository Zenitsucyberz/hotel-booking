<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\HotelRoom;
use App\Models\HotelRoomCategories;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = HotelRoom::all();
        $categories = HotelRoomCategories::all();
        return view('app.rooms.index',['rooms' => $rooms , 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = HotelRoomCategories::all();
        return view('app.rooms.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $input = $request->validate([
            'room_label' => ['required','string'],
            'room_count' => ['required','integer'],
            'hotel_room_category_id' => ['required','integer'],
            'rate' => ['required', 'numeric'],
            
            'status' => ['required','string'],
            'image' => ['nullable','string'],
            'maximum_guests' => ['required','integer'],
            'beds' => ['required','integer'],

        ]);
        
        HotelRoom::create($input);
        return redirect()->route('rooms.index');
        
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
    public function edit(HotelRoom $room)
    {
        $categories = HotelRoomCategories::all();
        return view('app.rooms.edit',['room' => $room,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelRoom $room)
    {
        $input = $request->validate([
            'room_label' => ['required','string'],
            'room_count' => ['required','integer'],
            'hotel_room_category_id' => ['required','integer'],
            'rate' => ['required', 'numeric'],
            
            'status' => ['required','string'],
            'image' => ['nullable','string'],
            'maximum_guests' => ['required','integer'],
            'beds' => ['required','integer'],

        ]);
        $room->update($input);
        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelRoom $room)
    {
        
        $room->delete();
        return response()->json(['message' => 'rooms deleted successfully']);
    }
}

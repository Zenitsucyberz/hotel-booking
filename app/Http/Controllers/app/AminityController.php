<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\HotelAminity;
use Illuminate\Http\Request;

class AminityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aminities = HotelAminity::all();
        return view('app.aminities.index',['aminities'=>$aminities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.aminities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => ['required', 'string'],
        ]);
        // Create and save amenity to database
        HotelAminity::create($input);
        return redirect()->route('aminities.index');
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
    public function edit(HotelAminity $aminity)
    {
        return view('app.aminities.edit',['aminities' => $aminity]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelAminity $aminity)
    {
        $input = $request->validate([
            'name' => ['required', 'string'],
        ]);
        $aminity->update($input);
        return redirect()->route('aminities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelAminity $aminity)
    {
        $aminity->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}

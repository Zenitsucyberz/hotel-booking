<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\TaxType;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taxes = TaxType::all();
        return view('app.tax.index',['taxes' => $taxes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.tax.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => ['required','string'],
            'tax_amount' => ['required','integer'],

        ]);
        TaxType::create($input);
        return redirect()->route('taxes.index');
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
    public function edit(TaxType $tax)
    {
        return view('app.tax.edit',['tax'=>$tax]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaxType $tax)
    {
        $input = $request->validate([
            'name' => ['required','string'],
            'tax_amount' => ['required','integer'],

        ]);
        $tax->update($input);
           return redirect()->route('taxes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaxType $tax)
    {
        $tax->delete();
        return response()->json(['message' => 'Tax Deleted Successfully']);
    }
}

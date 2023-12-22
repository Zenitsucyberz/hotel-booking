<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class InvoiceController extends Controller
{
    public function index()
    {
        

        $pdf = PDF::loadView('invoice.pdf',[]);

        return $pdf->stream('document.pdf');
    }
}

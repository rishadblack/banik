<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function salesInvoice(Request $request){
        return view('invoices.sales-invoice');
    }
}


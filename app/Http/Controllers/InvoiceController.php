<?php

namespace App\Http\Controllers;

use App\Models\Order\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function salesInvoice(Request $request)
    {
        $sales = Order::where('type', 1)
        ->firstOrFail();

        return view('invoices.sales-invoice',compact('sales'));
    }
    public function purchaseInvoice(Request $request)
    {
        $purchase = Order::where('type', 3)
        ->firstOrFail();

        return view('invoices.purchase-invoice',compact('purchase'));
    }
    public function moneyReceipt(Request $request)
    {
        // $sale = Order::where('type', 1)
        // ->firstOrFail();

        return view('money-receipt');
    }
}

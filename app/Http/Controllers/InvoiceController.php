<?php

namespace App\Http\Controllers;

use App\Models\Order\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function salesInvoice($id)
    {
        $order = Order::find($id);
        if (!$order) {
            abort(404);
        }
        return view('invoices.sales-invoice', ['order' => $order]);

    }
    public function purchaseInvoice($id)
    {
        $order = Order::find($id);
        if (!$order) {
            abort(404);
        }
        return view('invoices.purchase-invoice', ['order' => $order]);
    }
    public function moneyReceipt(Request $request)
    {
        // $sale = Order::where('type', 1)
        // ->firstOrFail();

        return view('money-receipt');
    }
}

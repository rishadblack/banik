<?php

namespace App\Http\Controllers;

use App\Models\Order\Order;

class InvoiceController extends Controller
{
    public function salesInvoice($id)
    {
        $order = Order::with('contact','contactinfo','transaction')->find($id);
        return view('invoices.sales-invoice', ['order' => $order]);
    }
    public function purchaseInvoice($orderId)
    {
        $order = Order::with('contact','contactinfo','transaction')->find($orderId);
        return view('invoices.purchase-invoice', ['order' => $order]);
    }

    public function moneyReceipt($id)
    {
        $order = Order::with('contact','contactinfo')->find($id);

        return view('money-receipt', ['order' => $order]);
    }
}

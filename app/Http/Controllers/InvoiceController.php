<?php

namespace App\Http\Controllers;

use App\Models\Order\Order;
use App\Models\Order\OrderItem;
use App\Models\Product\Product;
use App\Models\Accounting\Transaction;

class InvoiceController extends Controller
{

    public function salesInvoice($id)
    {
        $order = Order::where('type','1')->with('contact','contactinfo','OrderItem','OrderItem.Product')->find($id);
        return view('invoices.sales-invoice', ['order' => $order]);
    }
    public function purchaseInvoice($id)
    {

        $order = Order::where('type','3')->with('contact','contactinfo','OrderItem','OrderItem.Product')->find($id);

        return view('invoices.purchase-invoice', [
            'order' => $order
        ]);
    }

    public function moneyReceipt($id)
    {
        $Transaction = Transaction::with('PaymentMethod','contact','contactInfo')->find($id);

        return view('money-receipt', ['transaction' => $Transaction]);
    }
}

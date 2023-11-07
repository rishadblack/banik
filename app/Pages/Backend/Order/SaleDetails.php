<?php

namespace App\Pages\Backend\Order;

use App\Models\Order\Sale;
use App\Models\Order\Order;
use Livewire\Attributes\Url;
use Livewire\WithFileUploads;
use App\Http\Common\Component;
use App\Models\Contact\Contact;
use App\Models\Order\OrderItem;
use App\Models\Product\Product;
use Livewire\Attributes\Layout;
use App\Models\Contact\ContactInfo;
use Illuminate\Support\Facades\Auth;
use App\Models\Accounting\Transaction;
use Illuminate\Support\Facades\Storage;


#[Layout('layouts.backend')]
class SaleDetails extends Component
{
    #[Url]
    public $sale_id;
    public $contact_id;
    public $product_id;
    public $ref;
    public $outlet_id;
    public $delivery_status;
    public $name;
    public $warehouse_id;
    public $type;
    public $quantity;
    public $discount;
    public $subtotal;
    public $payment_status;
    public $payment_date;
    public $net_amount;
    public $amount;
    public $delivery_quantity;
    public $discount_amount;
    public $code;
    public $payment_method_id;
    public $sales_person;
    public $delivery_charge;
    public $txn_date;
    public $charge;

    public function storeSale($storeType = null)
    {

        $this->validate([
            'code' => 'required|string',

        ]);

        $Sale = Order::findOrNew($this->sale_id);
        $Sale->user_id = Auth::id();
        $Sale->code = $this->code;
        $Sale->ref = $this->ref;
        $Sale->warehouse_id = $this->warehouse_id;
        $Sale->outlet_id = $this->outlet_id;
        $Sale->type = 1;
        $Sale->contact_id = $this->contact_id;
        $Sale->payment_status = $this->payment_status;
        $Sale->sales_person = $this->sales_person;
        $Sale->save();

        $SaleInfo = OrderItem::findOrNew($this->sale_id);
        $SaleInfo->order_id = $Sale->id;
        $SaleInfo->amount = $this->amount;
        $SaleInfo->quantity = $this->quantity;
        $SaleInfo->discount = $this->discount;
        $SaleInfo->discount_amount = $this->discount_amount;
        $SaleInfo->save();

        if ($storeType == 'new') {
            $this->reset();
        } else {
            $this->sale_id = $Sale->id;
        }
        if ($this->sale_id) {
            $message = 'Sale Updated Successfully!';
        } else {
            $message = 'Sale Added Successfully!';
        }

        $this->alert('success', $message);
    }

    public function addPayment($storeType = null)
    {
        $this->validate([
            'payment_method_id' => 'required',
        ]);

        $Payment = Transaction::findOrNew($this->sale_id);
        $Payment->user_id = Auth::id();
        $Payment->payment_method_id = $this->payment_method_id;
        $Payment->net_amount = $this->net_amount;
        $Payment->charge = $this->charge;
        $Payment->ref = $this->ref;
        $Payment->txn_date = $this->txn_date;
        $Payment->save();

        if ($storeType == 'new') {
            $this->reset();
        } else {
            $this->sale_id = $Payment->id;
        }
        if ($this->sale_id) {
            $message = 'Payment Updated Successfully!';
        } else {
            $message = 'Payment Added Successfully!';
        }


        $this->alert('success', $message);
    }
    public function delete($id)
    {
        Transaction::find($id)->delete();
        $this->dispatch('refreshDatatable');
    }

    public function mount()
    {
        if ($this->sale_id) {
            $Sale = Order::find($this->sale_id);
            $this->code = $Sale->code;
            $this->ref = $Sale->ref;
            $this->warehouse_id = $Sale->warehouse_id;
            $this->outlet_id = $Sale->outlet_id;
            $this->contact_id = $Sale->contact_id;
            $this->payment_status = $Sale->payment_status;
            $this->delivery_status = $Sale->delivery_status;
            $this->discount = $Sale->discount;
            $this->sales_person = $Sale->sales_person;
            $this->delivery_charge = $Sale->delivery_charge;

            $Sale = Transaction::find($this->sale_id);
            $this->payment_method_id = $Sale->payment_method_id;
            $this->net_amount = $Sale->net_amount;
            $this->charge = $Sale->charge;
            $this->ref = $Sale->ref;
            $this->txn_date = $Sale->txn_date;

            /* $SaleInfo = OrderItem::findOrNew($this->sale_id);
            $this->product_id = $SaleInfo->product_id;
            $this->name = $SaleInfo->name;
            $this->amount = $SaleInfo->amount;
            $this->quantity = $SaleInfo->quantity;
            $this->delivery_quantity = $SaleInfo->delivery_quantity;
            $this->subtotal = $SaleInfo->subtotal;
            $this->discount_amount = $SaleInfo->discount_amount;*/
        }
    }

    public function render()
    {
        $customer = Contact::where('type', 1)->get();
        $order = Order::Where('type', 1);
        $payment = OrderItem::all();
        $product = Product::all();
        $transaction = Transaction::all();
        return view('pages.backend.order.sale-details', compact('customer', 'payment', 'order', 'product', 'transaction'));
    }
}

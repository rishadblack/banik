<?php

namespace App\Pages\Backend\Order;


use App\Models\Order\Order;
use Livewire\Attributes\Url;
use Livewire\WithFileUploads;
use App\Http\Common\Component;
use App\Models\Order\Purchase;
use App\Models\Contact\Contact;
use App\Models\Order\OrderItem;
use App\Models\Product\Product;
use Livewire\Attributes\Layout;
use App\Models\Contact\ContactInfo;
use Illuminate\Support\Facades\Auth;
use App\Models\Accounting\Transaction;
use Illuminate\Support\Facades\Storage;


#[Layout('layouts.backend')]
class PurchaseDetails extends Component
{

    #[Url]
    public $purchase_id;
    public $contact_id;
    public $product_id;
    public $ref;
    public $outlet_id;
    public $delivery_status;
    public $name;
    public $warehouse_id;
    public $payment_method_id;
    public $payment_date;
    public $type;
    public $quantity;
    public $discount;
    public $subtotal;
    public $payment_status;
    public $net_amount;
    public $received_quantity;
    public $discount_amount;
    public $additional_charge;
    public $paid_amount;
    public $code;
    public $txn_date;
    public $charge;

    public function storePurchase($storeType = null)
    {

        $this->validate([
            'code' => 'required|string',

        ]);

        $Purchase = Order::findOrNew($this->purchase_id);
        $Purchase->user_id = Auth::id();
        $Purchase->code = $this->code;
        $Purchase->ref = $this->ref;
        $Purchase->warehouse_id = $this->warehouse_id;
        $Purchase->outlet_id = $this->outlet_id;
        $Purchase->type = 3;
        $Purchase->contact_id = $this->contact_id;
        $Purchase->payment_status = $this->payment_status;
        $Purchase->payment_date = $this->payment_date;
        $Purchase->delivery_status = $this->delivery_status;
        $Purchase->discount = $this->discount;
        $Purchase->save();

        /*$PurchaseInfo = OrderItem::findOrNew($this->purchase_id);
        $PurchaseInfo->order_id = $Purchase->id;
        $PurchaseInfo->product_id = $this->product_id;
        $PurchaseInfo->name = $this->name;
        $PurchaseInfo->amount = $this->amount;
        $PurchaseInfo->quantity = $this->quantity;
        $PurchaseInfo->discount_amount = $this->discount_amount;
        $PurchaseInfo->subtotal = $this->subtotal;
        $PurchaseInfo->received_quantity = $this->received_quantity;
        $PurchaseInfo->save();*/

        if($storeType == 'new'){
            $this->reset();
        }else{
            $this->purchase_id = $Purchase-> id;
        }
        if($this->purchase_id) {
            $message = 'Purchase Updated Successfully!';
        } else {
            $message = 'Purchase Added Successfully!';
        }

        $this->alert('success', $message);
    }


    public function addPayment($storeType = null){
        $this->validate([
            'payment_method_id' => 'required',
        ]);

        $Payment = Transaction::findOrNew($this->purchase_id);
        $Payment->user_id = Auth::id();
        $Payment->payment_method_id = $this->payment_method_id;
        $Payment->net_amount = $this->net_amount;
        $Payment->charge = $this->charge;
        $Payment->ref = $this->ref;
        $Payment->txn_date = $this->txn_date;
        $Payment->save();

        if($storeType == 'new'){
            $this->reset();
        }else{
            $this->purchase_id = $Payment-> id;
        }
        if($this->purchase_id) {
            $message = 'Payment Updated Successfully!';
        } else {
            $message = 'Payment Added Successfully!';
        }


        $this->alert('success', $message);

    }

    public function mount()
    {
        if($this->purchase_id) {
            $Purchase = Order::find($this->purchase_id);
            $this->code = $Purchase->code;
            $this->ref = $Purchase->ref;
            $this->warehouse_id = $Purchase->warehouse_id;
            $this->outlet_id = $Purchase->outlet_id;
            $this->contact_id = $Purchase->contact_id;
            $this->payment_status = $Purchase->payment_status;
            $this->payment_date = $Purchase->payment_date;
            $this->payment_method_id = $Purchase->payment_method_id;
            $this->delivery_status = $Purchase->delivery_status;
            $this->discount = $Purchase->discount;
            $this->paid_amount = $Purchase->paid_amount;

            $Purchase = Transaction::find($this->purchase_id);
            $this->payment_method_id = $Purchase->payment_method_id;
            $this->net_amount = $Purchase->net_amount;
            $this->charge = $Purchase->charge;
            $this->ref = $Purchase->ref;
            $this->txn_date = $Purchase->txn_date;

            /*$PurchaseInfo = OrderItem::findOrNew($this->purchase_id);
            $this->product_id = $PurchaseInfo->product_id;
            $this->name = $PurchaseInfo->name;
            $this->amount = $PurchaseInfo->amount;
            $this->quantity = $PurchaseInfo->quantity;
            $this->received_quantity = $PurchaseInfo->received_quantity;
            $this->subtotal = $PurchaseInfo->subtotal;
            $this->discount_amount = $PurchaseInfo->discount_amount;*/
        }
    }

    public function delete($id){
        Transaction::find($id)->delete();
        $this->dispatch('refreshDatatable');
    }

    public function render()
    {
        $supplier = Contact::where('type', 2)->get();
        $order = Order::where('type',3)->get();
        $payment = OrderItem::all();
        $product=Product::all();
        $transaction=Transaction::all();
        return view('pages.backend.order.purchase-details', compact('supplier','payment','order','product','transaction'));
    }
}

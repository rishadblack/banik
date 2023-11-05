<?php

namespace App\Pages\Backend\Order;


use App\Models\Order\Order;
use Livewire\Attributes\Url;
use App\Http\Common\Component;
use App\Models\Contact\Contact;
use App\Models\Order\OrderItem;
use App\Models\Product\Product;
use Livewire\Attributes\Layout;
use App\Models\Contact\ContactInfo;
use App\Models\order\PurchaseReturn;
use Illuminate\Support\Facades\Auth;


#[Layout('layouts.backend')]
class PurchasereturnDetails extends Component
{
    #[Url]
    public $purchase_id;
    public $purchase_code;
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
    public $amount;
    public $received_quantity;
    public $discount_amount;
    public $additional_charge;
    public $paid_amount;
    public $code;

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
        $Purchase->type = 4;
        $Purchase->contact_id = $this->contact_id;
        $Purchase->payment_status = $this->payment_status;
        $Purchase->payment_method_id = $this->payment_method_id;
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
            $message = 'Purchase Return Updated Successfully!';
        } else {
            $message = 'Purchase Return Added Successfully!';
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
            $this->discount = $Purchase->discount;;

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

    public function render()
    {
        $supplier = Contact::where('type', 2)->get();
        $order = Order::where('type',4)->get();
        $payment = OrderItem::all();
        $product=Product::all();
        return view('pages.backend.order.purchasereturn-details',compact('payment','supplier','order'));
    }
}

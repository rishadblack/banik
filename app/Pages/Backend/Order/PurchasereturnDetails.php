<?php

namespace App\Pages\Backend\Order;


use App\Models\Order\Order;
use Livewire\Attributes\Url;
use App\Http\Common\Component;
use App\Models\Setting\Outlet;
use App\Models\Contact\Contact;
use App\Models\Order\OrderItem;
use App\Models\Product\Product;
use Livewire\Attributes\Layout;
use App\Models\Setting\Warehouse;
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
    public $purchase_return_ref;
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
        if($this->purchase_id) {
            $message = 'Purchase Return Updated Successfully!';
        } else {
            $message = 'Purchase Return Added Successfully!';
            $Purchase->user_id = Auth::id();
        }

        $Purchase->code = $this->code;
        $Purchase->ref = $this->purchase_return_ref;
        $Purchase->warehouse_id = $this->warehouse_id;
        $Purchase->outlet_id = $this->outlet_id;
        $Purchase->type = 4;
        $Purchase->contact_id = $this->contact_id;
        $Purchase->payment_status = $this->payment_status ?? 0;
        $Purchase->delivery_status = $this->delivery_status ?? 0;
        $Purchase->discount = $this->discount ?? 0;
        $Purchase->save();

        $PurchaseInfo = $Purchase->OrderItem()->firstOrNew();
        $PurchaseInfo->user_id =  $Purchase->user_id;
        $PurchaseInfo->order_id = $Purchase->id;
        $PurchaseInfo->product_id = $this->product_id;
        $PurchaseInfo->name = $this->name??0;
        $PurchaseInfo->amount = $this->amount??0;
        $PurchaseInfo->quantity = $this->quantity??0;
        $PurchaseInfo->discount_amount = $this->discount_amount??0;
        $PurchaseInfo->subtotal = $this->subtotal??0;
        $PurchaseInfo->received_quantity = $this->received_quantity??0;
        $PurchaseInfo->save();

        if($storeType == 'new'){
            $this->purchaseReset();
        }else{
            $this->purchase_id = $Purchase-> id;
        }


        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');
    }
    public function purchaseReset()
    {
        $this->reset();
        $this->resetValidation();
       $this->code = str_pad((Order::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
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
            $this->payment_date = $Purchase->payment_date??0;
            $this->payment_method_id = $Purchase->payment_method_id ??0;
            $this->delivery_status = $Purchase->delivery_status??0;
            $this->discount = $Purchase->discount??0;

            $this->product_id = $Purchase->OrderItem->product_id;
            $this->name = $Purchase->OrderItem->name;
            $this->amount = $Purchase->OrderItem->amount;
            $this->quantity = $Purchase->OrderItem->quantity;
            $this->received_quantity = $Purchase->OrderItem->received_quantity ?? 0;
            $this->subtotal = $Purchase->OrderItem->subtotal ??0;
            $this->discount_amount = $Purchase->OrderItem->discount_amount ?? 0;
        }else{
            $this->purchaseReset();
        }
    }

    public function render()
    {
        $supplier = Contact::where('type', 2)->get();
        $order = Order::where('type',4)->get();
        $payment = OrderItem::all();
        $product=Product::all();
        $outlet = Outlet::all();
        $warehouse = Warehouse::all();
        return view('pages.backend.order.purchasereturn-details',compact('payment','supplier','order','outlet','warehouse'));
    }
}

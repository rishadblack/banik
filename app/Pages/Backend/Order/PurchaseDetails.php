<?php

namespace App\Pages\Backend\Order;


use App\Models\Order\Order;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithFileUploads;
use App\Http\Common\Component;
use App\Models\Order\Purchase;
use App\Models\Setting\Outlet;
use App\Models\Contact\Contact;
use App\Models\Order\OrderItem;
use App\Models\Product\Product;
use Livewire\Attributes\Layout;
use App\Models\Setting\Warehouse;
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
    public $purchase_ref;
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
    public $amount;
    public $code;
    public $txn_date;
    public $charge;

    public function storePurchase($storeType = null)
    {

        $this->validate([
            'code' => 'required|string',

        ]);


        $Purchase = Order::findOrNew($this->purchase_id);
        if($this->purchase_id) {
            $message = 'Purchase Updated Successfully!';
        } else {
            $message = 'Purchase Added Successfully!';
            $Purchase->user_id = Auth::id();
        }

        $Purchase->code = $this->code;
        $Purchase->ref = $this->purchase_ref;
        $Purchase->warehouse_id = $this->warehouse_id;
        $Purchase->outlet_id = $this->outlet_id;
        $Purchase->type = 3;
        $Purchase->contact_id = $this->contact_id;
        $Purchase->payment_status = $this->payment_status;
        $Purchase->payment_date = $this->payment_date;
        $Purchase->delivery_status = $this->delivery_status;
        $Purchase->discount = $this->discount;
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
        $this->dispatch('refreshDatatable');


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

            $this->name = $Purchase->OrderItem->name;
            $this->amount = $Purchase->OrderItem->amount;
            $this->quantity =$Purchase->OrderItem->quantity;
            $this->received_quantity =$Purchase->OrderItem->received_quantity;
            $this->subtotal =$Purchase->OrderItem->subtotal;
            $this->discount_amount =$Purchase->OrderItem->discount_amount;


        }else{
            $this->purchaseReset();
        }
    }

    public function delete($id){
        Transaction::find($id)->delete();
        $this->dispatch('refreshDatatable');
    }

    #[On('openProductModal')]
    public function openProductModal($data = [])
    {

        $this->dispatch('modalOpen', 'productModal');
    }

    public function render()
    {
        $supplier = Contact::where('type', 2)->get();
        $order = Order::where('type',3)->get();
        $payment = OrderItem::all();
        $product=Product::all();
        $transaction=Transaction::all();
        $outlet = Outlet::all();
        $warehouse = Warehouse::all();
        return view('pages.backend.order.purchase-details', compact('supplier','payment','order','product','transaction','outlet','warehouse'));
    }
}

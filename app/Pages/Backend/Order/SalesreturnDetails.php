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
use App\Models\order\SaleReturn;
use App\Models\Setting\Warehouse;
use App\Models\Contact\ContactInfo;
use Illuminate\Support\Facades\Auth;


#[Layout('layouts.backend')]
class SalesreturnDetails extends Component
{

    #[Url]
    public $salereturn_id;

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
    public $amount;
    public $delivery_quantity;
    public $discount_amount;
    public $code;
    public $payment_method_id;
    public $sales_person;
    public $delivery_charge;

    public function storeSale($storeType = null)
    {

        $this->validate([
            'code' => 'required|string',

        ]);

        $Sale = Order::findOrNew($this->salereturn_id);
        if($this->salereturn_id) {
            $message = 'Sale Return Updated Successfully!';
        } else {
            $message = 'Sale Return Added Successfully!';
            $Sale->user_id = Auth::id();
        }

        $Sale->code = $this->code;
        $Sale->ref = $this->ref;
        $Sale->warehouse_id = $this->warehouse_id;
        $Sale->outlet_id = $this->outlet_id;
        $Sale->type = 2;
        $Sale->contact_id = $this->contact_id;
        $Sale->payment_status = $this->payment_status;
        $Sale->delivery_status = $this->delivery_status;
        $Sale->discount = $this->discount??0;
        $Sale->sales_person = $this->sales_person??0;
        $Sale->save();

        $SaleInfo = $Sale->OrderItem()->firstOrNew();
        $SaleInfo->user_id =  $Sale->user_id;
        $SaleInfo->order_id = $Sale->id;
        $SaleInfo->product_id = $this->product_id;
        $SaleInfo->name = $this->name??0;
        $SaleInfo->amount = $this->amount??0;
        $SaleInfo->quantity = $this->quantity??0;
        $SaleInfo->discount_amount = $this->discount_amount??0;
        $SaleInfo->subtotal = $this->subtotal??0;
        $SaleInfo->received_quantity = $this->received_quantity??0;
        $SaleInfo->save();

        if($storeType == 'new'){
            $this->salesReset();
        }else{
            $this->salereturn_id = $Sale-> id;
        }


        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');
    }
    public function salesReset()
    {
        $this->reset();
        $this->resetValidation();
       $this->code = str_pad((Order::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
    }

    public function mount()
    {
        if($this->salereturn_id) {
            $Sale = Order::find($this->salereturn_id);
            $this->code = $Sale->code;
            $this->ref = $Sale->ref;
            $this->warehouse_id = $Sale->warehouse_id;
            $this->outlet_id = $Sale->outlet_id;
            $this->contact_id = $Sale->contact_id;
            $this->payment_status = $Sale->payment_status;
            $this->delivery_status = $Sale->delivery_status;
            $this->discount = $Sale->discount;
            $this->sales_person = $Sale->sales_person;
            $this->payment_method_id = $Sale->payment_method_id;


            $this->product_id =  $Sale->OrderItem->product_id;
            $this->name =  $Sale->OrderItem->name;
            $this->amount =  $Sale->OrderItem->amount;
            $this->quantity =  $Sale->OrderItem->quantity;
            $this->delivery_quantity =  $Sale->OrderItem->delivery_quantity;
            $this->subtotal =  $Sale->OrderItem->subtotal;
            $this->discount_amount =  $Sale->OrderItem->discount_amount;
        }else{
            $this->salesReset();
        }
    }


    public function render()
    {
        $customer = Contact::where('type', 1)->get();
        $order = Order::Where('type',2);
        $payment = OrderItem::all();
        $product=Product::all();
        $outlet = Outlet::all();
        $warehouse = Warehouse::all();
        return view('pages.backend.order.salesreturn-details',compact('customer','payment','order','product','outlet','warehouse'));
    }
}

<?php

namespace App\Pages\Backend\Order;

use App\Models\Order\Order;
use Livewire\Attributes\Url;
use App\Http\Common\Component;
use App\Models\Contact\Contact;
use App\Models\Order\OrderItem;
use App\Models\Product\Product;
use Livewire\Attributes\Layout;
use App\Models\order\SaleReturn;
use App\Models\Contact\ContactInfo;
use Illuminate\Support\Facades\Auth;


#[Layout('layouts.backend')]
class SalesreturnDetails extends Component
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

        $Sale = Order::findOrNew($this->sale_id);
        $Sale->user_id = Auth::id();
        $Sale->code = $this->code;
        $Sale->ref = $this->ref;
        $Sale->warehouse_id = $this->warehouse_id;
        $Sale->outlet_id = $this->outlet_id;
        $Sale->type = 2;
        $Sale->contact_id = $this->contact_id;
        $Sale->payment_status = $this->payment_status;
        $Sale->payment_date = $this->payment_date;
        $Sale->delivery_status = $this->delivery_status;
        $Sale->discount = $this->discount;
        $Sale->sales_person = $this->sales_person;
        $Sale->payment_method_id = $this->payment_method_id;
        $Sale->save();

       /* $SaleInfo = OrderItem::findOrNew($this->sale_id);
        $SaleInfo->order_id = $Sale->id;
        $SaleInfo->product_id = $this->product_id;
        $SaleInfo->name = $this->name;
        $SaleInfo->amount = $this->amount;
        $SaleInfo->quantity = $this->quantity;
        $SaleInfo->discount_amount = $this->discount_amount;
        $SaleInfo->subtotal = $this->subtotal;
        $SaleInfo->delivery_quantity = $this->delivery_quantity;
        $SaleInfo->save();*/

        if($storeType == 'new'){
            $this->reset();
        }else{
            $this->sale_id = $Sale-> id;
        }
        if($this->sale_id) {
            $message = 'Sale Return Updated Successfully!';
        } else {
            $message = 'Sale Return Added Successfully!';
        }

        $this->alert('success', $message);
    }

    public function mount()
    {
        if($this->sale_id) {
            $Sale = Order::find($this->sale_id);
            $this->code = $Sale->code;
            $this->ref = $Sale->ref;
            $this->warehouse_id = $Sale->warehouse_id;
            $this->outlet_id = $Sale->outlet_id;
            $this->contact_id = $Sale->contact_id;
            $this->payment_status = $Sale->payment_status;
            $this->payment_date = $Sale->payment_date;
            $this->delivery_status = $Sale->delivery_status;
            $this->discount = $Sale->discount;
            $this->sales_person = $Sale->sales_person;
            $this->payment_method_id = $Sale->payment_method_id;

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
        $order = Order::Where('type',2);
        $payment = OrderItem::all();
        $product=Product::all();
        return view('pages.backend.order.salesreturn-details',compact('customer','payment','order','product'));
    }
}

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
use Illuminate\Support\Facades\Auth;


#[Layout('layouts.backend')]
class QuotationDetails extends Component
{

    #[Url]
    public $quotation_id;
    public $contact_id;
    public $product_id;
    public $ref;
    public $outlet_id;
    public $status;
    public $name;
    public $warehouse_id;
    public $type;
    public $quantity;
    public $discount;
    public $subtotal;
    public $amount;
    public $delivery_quantity;
    public $discount_amount;
    public $code;
    public $sales_person;
    public $payment_method_id;
    public $delivery_charge;
    public $payment_date;

    public function storeQuotation($storeType = null)
    {

        $this->validate([
            'code' => 'required|string',

        ]);

        $Quotation = Order::findOrNew($this->quotation_id);
        if($this->quotation_id) {
            $message = 'Quotation Updated Successfully!';
        } else {
            $message = 'Quotation Added Successfully!';
            $Quotation->user_id = Auth::id();
        }

        $Quotation->code = $this->code;
        $Quotation->ref = $this->ref;
        $Quotation->warehouse_id = $this->warehouse_id;
        $Quotation->outlet_id = $this->outlet_id;
        $Quotation->type = 5;
        $Quotation->contact_id = $this->contact_id;
        $Quotation->status = $this->status;
        $Quotation->sales_person = $this->sales_person;
        $Quotation->save();

        $QuotationInfo = $Quotation->OrderItem()->firstOrNew();
        $QuotationInfo->user_id =  $Quotation->user_id;
        $QuotationInfo->order_id = $Quotation->id;
        $QuotationInfo->product_id = $this->product_id;
        $QuotationInfo->name = $this->name??0;
        $QuotationInfo->amount = $this->amount??0;
        $QuotationInfo->quantity = $this->quantity??0;
        $QuotationInfo->discount_amount = $this->discount_amount??0;
        $QuotationInfo->subtotal = $this->subtotal??0;
        $QuotationInfo->received_quantity = $this->received_quantity??0;
        $QuotationInfo->save();

        if($storeType == 'new'){
            $this->quotationReset();
        }else{
            $this->quotation_id = $Quotation-> id;
        }


        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');
    }
    public function quotationReset()
    {
        $this->reset();
        $this->resetValidation();
       $this->code = str_pad((Order::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
    }

    public function mount()
    {
        if($this->quotation_id) {
            $Quotation = Order::find($this->quotation_id);
            $this->code = $Quotation->code;
            $this->ref = $Quotation->ref;
            $this->warehouse_id = $Quotation->warehouse_id;
            $this->outlet_id = $Quotation->outlet_id;
            $this->contact_id = $Quotation->contact_id;
            $this->status = $Quotation->status;
            $this->discount = $Quotation->discount;
            $this->sales_person = $Quotation->sales_person;
            $this->delivery_charge = $Quotation->delivery_charge;
            $this->payment_method_id = $Quotation->payment_method_id;


            $this->product_id = $Quotation->OrderItem->product_id;
            $this->name = $Quotation->OrderItem->name;
            $this->amount = $Quotation->OrderItem->amount;
            $this->quantity = $Quotation->OrderItem->quantity;
            $this->delivery_quantity = $Quotation->OrderItem->delivery_quantity;
            $this->subtotal = $Quotation->OrderItem->subtotal;
            $this->discount_amount = $Quotation->OrderItem->discount_amount;
        }else{
            $this->quotationReset();
        }
    }


    public function render()
    {
        $customer = Contact::where('type', 1)->get();
        $order = Order::all();
        $payment = OrderItem::all();
        $product=Product::all();
        $outlet = Outlet::all();
        $warehouse = Warehouse::all();
        return view('pages.backend.order.quotation-details',compact('customer','payment','order','product','outlet','warehouse'));
    }
}

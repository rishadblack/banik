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
    public $delivery_status;
    public $name;
    public $warehouse_id;
    public $type;
    public $quantity;
    public $discount;
    public $subtotal;
    public $payment_status;
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
        $Quotation->user_id = Auth::id();
        $Quotation->code = $this->code;
        $Quotation->ref = $this->ref;
        $Quotation->warehouse_id = $this->warehouse_id;
        $Quotation->outlet_id = $this->outlet_id;
        $Quotation->type = 5;
        $Quotation->contact_id = $this->contact_id;
        $Quotation->discount = $this->discount;
        $Quotation->delivery_charge = $this->delivery_charge;
        $Quotation->payment_date = $this->payment_date;
        $Quotation->sales_person = $this->sales_person;
        $Quotation->payment_method_id = $this->payment_method_id;
        $Quotation->save();

        /*$SaleInfo = OrderItem::findOrNew($this->quotation_id);
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
            $this->quotation_id = $Quotation-> id;
        }
        if($this->quotation_id) {
            $message = 'Quotation Updated Successfully!';
        } else {
            $message = 'Quotation Added Successfully!';
        }

        $this->alert('success', $message);
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
            $this->discount = $Quotation->discount;
            $this->sales_person = $Quotation->sales_person;
            $this->payment_date = $Quotation->payment_date;
            $this->delivery_charge = $Quotation->delivery_charge;
            $this->payment_method_id = $Quotation->payment_method_id;

           /* $SaleInfo = OrderItem::findOrNew($this->quotation_id);
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
        $order = Order::all();
        $payment = OrderItem::all();
        $product=Product::all();
        return view('pages.backend.order.quotation-details',compact('customer','payment','order','product'));
    }
}

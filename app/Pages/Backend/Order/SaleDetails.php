<?php

namespace App\Pages\Backend\Order;

use App\Models\Order\Sale;
use App\Models\Order\Order;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithFileUploads;
use App\Http\Common\Component;
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
class SaleDetails extends Component
{
    #[Url]
    public $sale_id;

    public $search_product;

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

    public $item_rows = [];

    public function updatedSearchProduct($value)
    {
        dd($value);
    }

    public function storeSale($storeType = null)
    {

        $this->validate([
            'code' => 'required|string',

        ]);

        $Sale = Order::findOrNew($this->sale_id);
        if ($this->sale_id) {
            $message = 'Sale Updated Successfully!';
        } else {
            $message = 'Sale Added Successfully!';
            $Sale->user_id = Auth::id();
        }


        $Sale->code = $this->code;
        $Sale->ref = $this->ref;
        $Sale->warehouse_id = $this->warehouse_id;
        $Sale->outlet_id = $this->outlet_id;
        $Sale->type = 1;
        $Sale->contact_id = $this->contact_id;
        $Sale->payment_status = $this->payment_status;
        $Sale->delivery_status = $this->delivery_status;
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

        if ($storeType == 'new') {
            $this->reset();
        } else {
            $this->sale_id = $Sale->id;
        }

        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');
    }

    public function addPayment($storeType = null){
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

        if($storeType == 'new'){
            $this->salesReset();
        }else{
            $this->sale_id = $Payment-> id;
        }
        if($this->sale_id) {
            $message = 'Payment Updated Successfully!';
        } else {
            $message = 'Payment Added Successfully!';
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
            $this->discount = $Sale->discount??0;
            $this->sales_person = $Sale->sales_person??0;
            $this->delivery_charge = $Sale->delivery_charge??0;

            $this->product_id = $Sale->OrderItem->product_id;
            $this->name = $Sale->OrderItem->name;
            $this->amount = $Sale->OrderItem->amount;
            $this->quantity = $Sale->OrderItem->quantity;
            $this->delivery_quantity = $Sale->OrderItem->delivery_quantity;
            $this->subtotal = $Sale->OrderItem->subtotal;
            $this->discount_amount = $Sale->OrderItem->discount_amount;
        }else{
            $this->salesReset();
        }
    }

    #[On('openProductModal')]
    public function openProductModal($data = [])
    {

        $this->dispatch('modalOpen', 'productModal');
    }

    public function render()
    {
        $customer = Contact::where('type', 1)->get();
        $order = Order::where('type', 1);
        $payment = OrderItem::all();
        $product = Product::all();
        $transaction = Transaction::all();
        $outlet = Outlet::all();
        $warehouse = Warehouse::all();
        return view('pages.backend.order.sale-details', compact('customer', 'payment', 'order', 'product', 'transaction','outlet','warehouse'));
    }
}

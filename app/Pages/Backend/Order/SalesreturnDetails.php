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
    public $amount;
    public $delivery_quantity;
    public $discount_amount;
    public $code;
    public $payment_method_id;
    public $sales_person;
    public $delivery_charge;
    public $net_amount;

    public $item_rows = [];
    public $item_product_id = [];
    public $item_name = [];
    public $item_code = [];
    public $item_price = [];
    public $item_quantity = [];
    public $item_discount = [];
    public $item_subtotal = [];

    public function updatedSearchProduct($value)
    {
        if(empty($value)){
            return true;
        }

        $Product = Product::find($value);

        $item_rows = collect($this->item_rows);

        if($item_rows->contains($Product->id)){
            $this->alert('error', 'Product Already Added!');
            return true;
        }

        $item_rows->push($Product->id);
        $this->item_rows = $item_rows;

        $this->item_product_id[$Product->id] = $Product->id;
        $this->item_name[$Product->id] = $Product->name;
        $this->item_code[$Product->id] = $Product->code;
        $this->item_price[$Product->id] = $Product->net_purchase_price;
        $this->item_quantity[$Product->id] = 1;
        $this->item_discount[$Product->id] = 0;
        $this->item_subtotal[$Product->id] = $Product->net_purchase_price;

        $this->reset('search_product');
        $this->dispatch('search_product_reset');
    }

    public function updatedItemPrice($value, $productId)
    {
        $this->ItemRowsUpdate($productId);
    }

    public function updatedItemQuantity($value, $productId)
    {
        $this->ItemRowsUpdate($productId);
    }

    public function updatedItemDiscount($value, $productId)
    {
        $this->ItemRowsUpdate($productId);
    }

    public function ItemRowsUpdate($productId)
    {
        $item_price = isset($this->item_price[$productId]) && $this->item_price[$productId] > 0 ? $this->item_price[$productId] : 0;
        $item_quantity = isset($this->item_quantity[$productId]) && $this->item_quantity[$productId] > 0 ? $this->item_quantity[$productId] : 1;
        $item_discount = isset($this->item_discount[$productId]) && $this->item_discount[$productId] > 0 ? $this->item_discount[$productId] : 0;

        $this->item_subtotal[$productId] = ($item_price * $item_quantity) - $item_discount;

        $this->rowsUpdate();
    }

    public function rowsUpdate()
    {
        $item_subtotal = collect($this->item_subtotal)->sum();
        $item_quantity = collect($this->item_quantity)->sum();
        $item_discount = collect($this->item_discount)->sum();

        $this->subtotal = $item_subtotal;
        $this->net_amount = $item_subtotal;
        $this->discount = $item_discount;
    }

    public function removeItem($productId)
    {
        $item_rows = collect($this->item_rows);
        $item_rows = $item_rows->filter(function ($value, $key) use ($productId) {
            return $value != $productId;
        });
        $this->item_rows = $item_rows;

        unset($this->item_product_id[$productId]);
        unset($this->item_name[$productId]);
        unset($this->item_code[$productId]);
        unset($this->item_price[$productId]);
        unset($this->item_quantity[$productId]);
        unset($this->item_discount[$productId]);
        unset($this->item_subtotal[$productId]);

        $this->rowsUpdate();
    }

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

        foreach ($this->item_rows as $key => $value) {
            $SaleInfo = $Sale->OrderItem()->where('product_id',$this->item_product_id[$value])->firstOrNew(['order_id' => $Sale->id, 'product_id' => $this->item_product_id[$value]]);
            $SaleInfo->user_id = $Sale->user_id;
            $SaleInfo->order_id = $Sale->id;
            $SaleInfo->product_id = $value;
            $SaleInfo->name = $this->item_name[$value];
            $SaleInfo->amount = $this->item_price[$value];
            $SaleInfo->quantity = $this->item_quantity[$value];
            $SaleInfo->discount_amount = $this->item_discount[$value];
            $SaleInfo->subtotal = $this->item_subtotal[$value];
            $SaleInfo->save();
        }

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

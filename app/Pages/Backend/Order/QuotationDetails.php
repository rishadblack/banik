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
    public $search_product;

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
    public $net_amount;
    public $vat_amount;
    public $shipping_charge;

    //Purchase item
  public $item_rows = [];
  public $item_deleted_rows = [];
  public $item_product_id = [];
  public $item_name = [];
  public $item_code = [];
  public $item_price = [];
  public $item_quantity = [];
  public $item_discount = [];
  public $item_subtotal = [];

  public function updatedSearchProduct($value)
    {
        if (empty($value)) {
            return true;
        }

        $Product = Product::find($value);

        $item_rows = collect($this->item_rows);

        if ($item_rows->contains($Product->id)) {
            $this->alert('error', 'Product Already Added!');
            return true;
        }

        $item_rows->push($Product->id);
        $this->item_rows = $item_rows;

        $this->item_product_id[$Product->id] = $Product->id;
        $this->item_name[$Product->id] = $Product->name;
        $this->item_code[$Product->id] = $Product->code;
        $this->item_price[$Product->id] = numberFormat($Product->net_purchase_price);
        $this->item_quantity[$Product->id] = 1;
        $this->item_discount[$Product->id] = 0;
        $this->item_subtotal[$Product->id] = numberFormat($Product->net_purchase_price);

        $this->rowsUpdate();
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

    public function updatedDiscountAmount($value)
    {
        $this->rowsUpdate();
    }

    public function updatedVatAmount($value)
    {
        $this->rowsUpdate();
    }

    public function updatedShippingCharge($value)
    {
        $this->rowsUpdate();
    }

    public function rowsUpdate()
    {
        $item_subtotal = collect($this->item_subtotal)->sum();
        $item_quantity = collect($this->item_quantity)->sum();
        $item_discount = collect($this->item_discount)->sum();
        $discount_amount = $this->discount_amount > 0 ? $this->discount_amount : 0;
        $vat_amount = $this->vat_amount > 0 ? $this->vat_amount : 0;
        $shipping_charge = $this->shipping_charge > 0 ? $this->shipping_charge : 0;

        $this->subtotal = $item_subtotal;
        $this->discount_amount = $item_discount;
        $this->net_amount = ($item_subtotal + $vat_amount + $shipping_charge) -  $discount_amount;
        // $this->paid_amount = collect($this->payment_item_rows)->sum('payment_amount');
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
        $Quotation->discount = $this->discount ?? 0;
        $Quotation->subtotal = $this->subtotal ?? 0;
        $Quotation->net_amount = $this->net_amount ?? 0;
        $Quotation->additional_charge = $this->additional_charge ?? 0;
        $Quotation->vat_amount = $this->vat_amount ?? 0;
        $Quotation->shipping_charge = $this->shipping_charge ?? 0;
        $Quotation->save();

        foreach ($this->item_rows as $key => $value) {
            $QuotationInfo = $Quotation->OrderItem()->where('product_id',$this->item_product_id[$value])->firstOrNew(['order_id' => $Quotation->id, 'product_id' => $this->item_product_id[$value]]);
            $QuotationInfo->user_id = $Quotation->user_id;
            $QuotationInfo->order_id = $Quotation->id;
            $QuotationInfo->product_id = $value;
            $QuotationInfo->name = $this->item_name[$value];
            $QuotationInfo->amount = $this->item_price[$value];
            $QuotationInfo->quantity = $this->item_quantity[$value];
            $QuotationInfo->discount_amount = $this->item_discount[$value];
            $QuotationInfo->subtotal = $this->item_subtotal[$value];
            $QuotationInfo->save();
        }



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
            $this->discount = numberFormat($Quotation->discount);
            $this->vat_amount = numberFormat($Quotation->vat_amount);
            $this->shipping_charge = numberFormat($Quotation->shipping_charge);
            $this->subtotal = $Quotation->subtotal;
            $this->net_amount = $Quotation->net_amount;

            foreach ($Quotation->OrderItem as $key => $OrderItem) {
                $item_rows = collect($this->item_rows);
                $item_rows->push($OrderItem->product_id);
                $this->item_rows = $item_rows;
                $this->item_product_id[$OrderItem->product_id] = $OrderItem->product_id;
                $this->item_name[$OrderItem->product_id] = $OrderItem->name;
                $this->item_code[$OrderItem->product_id] = $OrderItem->Product->code;
                $this->item_price[$OrderItem->product_id] = numberFormat($OrderItem->amount);
                $this->item_quantity[$OrderItem->product_id] = $OrderItem->quantity;
                $this->item_discount[$OrderItem->product_id] = numberFormat($OrderItem->discount) ?? 0;
                $this->item_subtotal[$OrderItem->product_id] = numberFormat($OrderItem->subtotal);
            }
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

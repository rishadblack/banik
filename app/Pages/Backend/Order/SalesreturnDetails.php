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
        // $this->discount_amount = $item_discount;
        $this->net_amount = ($item_subtotal + $vat_amount + $shipping_charge) -  $discount_amount;
        // $this->paid_amount = collect($this->payment_item_rows)->sum('payment_amount');
        // $this->due_amount = $this->paid_amount > 0 ?  $this->net_amount - $this->paid_amount : $this->net_amount;
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
        if ($this->salereturn_id) {
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
        $Sale->discount = $this->discount ?? 0;
        $Sale->sales_person = $this->sales_person ?? 0;
        $Sale->discount = $this->discount ?? 0;
        $Sale->subtotal = $this->subtotal ?? 0;
        $Sale->net_amount = $this->net_amount ?? 0;
        $Sale->additional_charge = $this->additional_charge ?? 0;
        $Sale->vat_amount = $this->vat_amount ?? 0;
        $Sale->shipping_charge = $this->shipping_charge ?? 0;
        $Sale->save();

        foreach ($this->item_rows as $key => $value) {
            $SaleInfo = $Sale->OrderItem()->where('product_id', $this->item_product_id[$value])->firstOrNew(['order_id' => $Sale->id, 'product_id' => $this->item_product_id[$value]]);
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

        if ($storeType == 'new') {
            $this->salesReset();
        } else {
            $this->salereturn_id = $Sale->id;
        }


        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');
    }
    public function salesReset()
    {
        $this->reset();
        $this->resetValidation();
        $latestOrder = Order::latest()->orderByDesc('id')->first();
        $numericPart = $latestOrder ? ((int)substr($latestOrder->code, 3) + 1) : 1;
        $this->code = 'SRET' . str_pad($numericPart, 6, '0', STR_PAD_LEFT);
        // $this->code = str_pad((Order::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
    }

    public function mount()
    {
        $lastSale = Order::latest()->orderByDesc('id')->first();

        if ($lastSale) {
            $lastCode = $lastSale->code;
            $newCodeNumber = intval($lastCode) + 1;
            $this->code = 'SRET'.str_pad($newCodeNumber, 6, '0', STR_PAD_LEFT);
        } else {
            $this->code = 'SRET000001';
        }

        if ($this->salereturn_id) {
            $Sale = Order::find($this->salereturn_id);
            if ($Sale) {
                $this->code = $Sale->code;
                $this->ref = $Sale->ref;
                $this->warehouse_id = $Sale->warehouse_id;
                $this->outlet_id = $Sale->outlet_id;
                $this->contact_id = $Sale->contact_id;
                $this->payment_status = $Sale->payment_status;
                $this->delivery_status = $Sale->delivery_status;
                $this->discount = $Sale->discount;
                $this->sales_person = $Sale->sales_person;
                $this->discount = numberFormat($Sale->discount);
                $this->vat_amount = numberFormat($Sale->vat_amount);
                $this->shipping_charge = numberFormat($Sale->shipping_charge);
                $this->subtotal = $Sale->subtotal;
                $this->net_amount = $Sale->net_amount;


                foreach ($Sale->OrderItem as $key => $OrderItem) {
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
    }


    public function render()
    {
        $customer = Contact::where('type', 1)->get();
        $order = Order::Where('type', 2);
        $payment = OrderItem::all();
        $product = Product::all();
        $outlet = Outlet::all();
        $warehouse = Warehouse::all();
        return view('pages.backend.order.salesreturn-details', compact('customer', 'payment', 'order', 'product', 'outlet', 'warehouse'));
    }
}

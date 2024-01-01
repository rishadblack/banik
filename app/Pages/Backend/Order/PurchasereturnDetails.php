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
    public $preturn_id;

    public $search_product;

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

    public function storePurchase($storeType = null)
    {

        $this->validate([
            'code' => 'required|string',
            'item_quantity' => 'required|min:1',
        ]);

        $Purchase = Order::findOrNew($this->preturn_id);
        if ($this->preturn_id) {
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
        $Purchase->vat_amount = $this->vat_amount ?? 0;
        $Purchase->shipping_charge = $this->shipping_charge ?? 0;
        $Purchase->save();

        foreach ($this->item_rows as $key => $value) {
            $PReturnInfo = $Purchase->OrderItem()->where('product_id', $this->item_product_id[$value])->firstOrNew(['order_id' => $Purchase->id, 'product_id' => $this->item_product_id[$value]]);
            $PReturnInfo->user_id =  $Purchase->user_id;
            $PReturnInfo->order_id = $Purchase->id;
            $PReturnInfo->product_id = $this->product_id;
            $PReturnInfo->name = $this->item_name[$value];
            $PReturnInfo->amount = $this->item_price[$value];
            $PReturnInfo->quantity = $this->item_quantity[$value];
            $PReturnInfo->discount_amount = $this->item_discount[$value];
            $PReturnInfo->subtotal = $this->item_subtotal[$value];
            $PReturnInfo->save();
        }
        if ($storeType == 'new') {
            $this->purchaseReset();
        } else {
            $this->preturn_id = $Purchase->id;
        }


        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');
    }
    public function purchaseReset()
    {
        $this->reset();
        $this->resetValidation();
        $latestOrder = Order::latest()->orderByDesc('id')->first();
        $numericPart = $latestOrder ? ((int)substr($latestOrder->code, 3) + 1) : 1;
        $this->code = 'PRET' . str_pad($numericPart, 6, '0', STR_PAD_LEFT);
        // $this->code = str_pad((Order::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
    }

    public function mount()
    {
        $lastSale = Order::latest()->orderByDesc('id')->first();

        if ($lastSale) {
            $lastCode = $lastSale->code;
            $newCodeNumber = intval($lastCode) + 1;
            $this->code = 'PRET'.str_pad($newCodeNumber, 6, '0', STR_PAD_LEFT);
        } else {
            $this->code = 'PRET000001';
        }

        if ($this->preturn_id) {
            $Purchase = Order::find($this->preturn_id);
            if ($Purchase) {
                $this->code = $Purchase->code;
                $this->ref = $Purchase->ref;
                $this->warehouse_id = $Purchase->warehouse_id;
                $this->outlet_id = $Purchase->outlet_id;
                $this->contact_id = $Purchase->contact_id;
                $this->payment_status = $Purchase->payment_status;
                $this->payment_date = $Purchase->payment_date ?? 0;
                $this->payment_method_id = $Purchase->payment_method_id ?? 0;
                $this->delivery_status = $Purchase->delivery_status ?? 0;
                $this->discount = $Purchase->discount ?? 0;
                $this->discount_amount = numberFormat($Purchase->discount_amount) ?? 0;
                $this->vat_amount = numberFormat($Purchase->vat_amount);
                $this->shipping_charge = numberFormat($Purchase->shipping_charge);
                $this->subtotal = $Purchase->subtotal;
                $this->net_amount = $Purchase->net_amount;
                $this->additional_charge = $Purchase->additional_charge;
                $this->paid_amount = $Purchase->paid_amount;

                foreach ($Purchase->OrderItem as $key => $OrderItem) {
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
        $supplier = Contact::where('type', 2)->get();
        $order = Order::where('type', 4)->get();
        $payment = OrderItem::all();
        $product = Product::all();
        $outlet = Outlet::all();
        $warehouse = Warehouse::all();
        return view('pages.backend.order.purchasereturn-details', compact('payment', 'supplier', 'order', 'outlet', 'warehouse'));
    }
}

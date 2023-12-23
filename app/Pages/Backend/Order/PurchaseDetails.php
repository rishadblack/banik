<?php

namespace App\Pages\Backend\Order;


use App\Models\Order\Order;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use App\Http\Common\Component;
use App\Models\Setting\Outlet;
use App\Models\Contact\Contact;
use App\Models\Order\OrderItem;
use App\Models\Product\Product;
use Livewire\Attributes\Layout;
use App\Models\Setting\Warehouse;
use Illuminate\Support\Facades\Auth;
use App\Models\Accounting\Transaction;


#[Layout('layouts.backend')]
class PurchaseDetails extends Component
{

    #[Url]
    public $purchase_id;

    public $search_product;

    public $add_payment;

    public $contact_id;
    public $product_id;
    public $ref;
    public $purchase_ref;
    public $outlet_id;
    public $delivery_status;
    public $name;
    public $warehouse_id;
    public $pmid;
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
    public $payment_amount;
    public $code;
    public $txn_date;
    public $charge;
    public $charges;

    public $item_rows = [];
    public $item_product_id = [];
    public $item_name = [];
    public $item_code = [];
    public $item_price = [];
    public $item_quantity = [];
    public $item_discount = [];
    public $item_subtotal = [];

    public $payments = [];

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

    public function removePayment($index)
    {
        unset($this->payments[$index]);
        $this->payments = array_values($this->payments);
    }


    public function storePurchase($storeType = null)
    {

        $this->validate([
            'code' => 'required|string',
            'item_quantity' => 'required|min:1',
        ]);

        $Purchase = Order::findOrNew($this->purchase_id);
        if ($this->purchase_id) {
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
        $Purchase->discount = $this->discount ?? 0;
        $Purchase->subtotal = $this->subtotal ?? 0;
        $Purchase->net_amount = $this->net_amount ?? 0;
        $Purchase->additional_charge = $this->additional_charge ?? 0;
        $Purchase->save();

        foreach ($this->item_rows as $key => $value) {
            $PurchaseInfo = $Purchase->OrderItem()->where('product_id', $this->item_product_id[$value])->firstOrNew(['order_id' => $Purchase->id, 'product_id' => $this->item_product_id[$value]]);
            $PurchaseInfo->user_id = $Purchase->user_id;
            $PurchaseInfo->order_id = $Purchase->id;
            $PurchaseInfo->product_id = $value;
            $PurchaseInfo->name = $this->item_name[$value];
            $PurchaseInfo->amount = $this->item_price[$value];
            $PurchaseInfo->quantity = $this->item_quantity[$value];
            $PurchaseInfo->discount_amount = $this->item_discount[$value];
            $PurchaseInfo->subtotal = $this->item_subtotal[$value];
            $PurchaseInfo->save();
        }

        //     $transaction = new Transaction();
        //     $transaction->user_id = $Purchase->user_id;
        //     $transaction->order_id = $Purchase->id;
        //     $transaction->payment_method_id = $payment['payment_method_id'];
        //     $transaction->amount = $payment['amount'];
        //     $transaction->charge = $payment['charge'];
        //     $transaction->purchase_ref = $payment['ref'];
        //     $transaction->txn_date = $payment['txn_date'];
        //     $transaction->save();

        // $this->payments = [];


        if ($storeType == 'new') {
            $this->purchaseReset();
        } else {
            $this->purchase_id = $Purchase->id;
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


    // public function addPayment($storeType = null){
    //     $this->validate([
    //         'payment_method_id' => 'required',
    //     ]);
    //     $Purchase = Order::findOrNew($this->purchase_id);
    //     $Transaction = Transaction::findOrNew($this->purchase_id);
    //     $Transaction->user_id = Auth::id();
    //     $Transaction->order_id = $Purchase->id;
    //     $Transaction->payment_method_id = $this->payment_method_id;
    //     $Transaction->amount = $this->amount??0;
    //     $Transaction->charge = $this->charge;
    //     $Transaction->ref = $this->ref;
    //     $Transaction->txn_date = $this->txn_date;
    //     $Transaction->save();

    //     if($storeType == 'new'){
    //         $this->reset();
    //     }else{
    //         $this->purchase_id = $Transaction-> id;
    //     }
    //     if($this->purchase_id) {
    //         $message = 'Payment Updated Successfully!';
    //     } else {
    //         $message = 'Payment Added Successfully!';
    //     }


    //     $this->alert('success', $message);
    //     // $this->dispatch('refreshDatatable');


    // }


    public function mount()
    {
        if ($this->purchase_id) {
            $Purchase = Order::find($this->purchase_id);
            $this->code = $Purchase->code;
            $this->ref = $Purchase->ref;
            $this->warehouse_id = $Purchase->warehouse_id;
            $this->outlet_id = $Purchase->outlet_id;
            $this->contact_id = $Purchase->contact_id;
            $this->payment_status = $Purchase->payment_status;
            $this->payment_date = $Purchase->payment_date;
            $this->pmid = $Purchase->pmid;
            $this->delivery_status = $Purchase->delivery_status;
            $this->discount = $Purchase->discount;

            $this->name = $Purchase->OrderItem->name;
            $this->amount = $Purchase->OrderItem->amount;
            $this->quantity = $Purchase->OrderItem->quantity;
            $this->received_quantity = $Purchase->OrderItem->received_quantity;
            $this->subtotal = $Purchase->OrderItem->subtotal;
            $this->discount_amount = $Purchase->OrderItem->discount_amount;
        } else {
            $this->purchaseReset();
        }
    }



    #[On('openProductModal')]
    public function openProductModal($data = [])
    {

        $this->dispatch('modalOpen', 'productModal');
    }

    public function render()
    {
        $supplier = Contact::where('type', 2)->get();
        $order = Order::where('type', 3)->get();
        $payment = OrderItem::all();
        $product = Product::all();
        $transaction = Transaction::all();
        $outlet = Outlet::all();
        $warehouse = Warehouse::all();
        return view('pages.backend.order.purchase-details', compact('supplier', 'payment', 'order', 'product', 'transaction', 'outlet', 'warehouse'));
    }




    public function addPayment()
    {
        $this->payments[] = [
            'date' => $this->txn_date,
            'ref' => $this->purchase_ref,
            'amount' => $this->payment_amount,
            'charge' => $this->charges,
            'payment_method_id' => $this->pmid,
        ];

            $this->txn_date = "";
            $this->payment_amount = "";
            $this->purchase_ref = "";
            $this->charges = "";
            $this->pmid = "";

            $this->netAmountUpdate();

    }


    public function netAmountUpdate()
    {
        // $payment_amount = collect($this->payment_amount)->sum();

        // $this->net_amount = $payment_amount;
    }
}

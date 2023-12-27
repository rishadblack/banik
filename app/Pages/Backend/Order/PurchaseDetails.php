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
use App\Models\Setting\PaymentMethod;
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
    public $code;
    public $charge;
    public $paid_amount;
    public $due_amount;
    public $shipping_charge;
    public $vat_amount;
    public $order_date;

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

    //Payment Info
    public $payment_method_id;
    public $payment_ref;
    public $payment_amount;
    public $payment_charge;
    public $payment_net_amount;
    public $txn_date;

    //Payment item
    public $payment_item_rows = [];
    public $payment_item_deleted_rows = [];

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
        $this->net_amount = ($item_subtotal + $vat_amount + $shipping_charge) -  $discount_amount;
        $this->paid_amount = collect($this->payment_item_rows)->sum('payment_amount');
        $this->due_amount = $this->paid_amount > 0 ?  $this->net_amount - $this->paid_amount : $this->net_amount;
    }

    public function removeItem($productId)
    {
        $item_rows = collect($this->item_rows);
        $this->item_deleted_rows[] = $productId;
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

        $Purchase = Order::findOrNew($this->purchase_id);
        if ($this->purchase_id) {
            $message = 'Purchase Updated Successfully!';
        } else {
            $message = 'Purchase Added Successfully!';
            $Purchase->user_id = Auth::id();
        }

        $Purchase->code = $this->code;
        $Purchase->ref = $this->ref;
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
        $Purchase->vat = $this->vat ?? 0;
        $Purchase->order_date = $this->order_date;
        $Purchase->shipping_charge = $this->shipping_charge ?? 0;
        $Purchase->paid_amount = $this->paid_amount ?? 0;
        $Purchase->due_amount = $this->due_amount ?? 0;
        $Purchase->save();

        if (count($this->item_deleted_rows) > 0) {
            OrderItem::where('order_id',$Purchase->id)->whereIn('product_id', $this->item_deleted_rows)->delete();
        }

        foreach ($this->item_rows as $key => $item) {
            $PurchaseItem = $Purchase->OrderItem()->where('product_id', $this->item_product_id[$item])->firstOrNew(['order_id' => $Purchase->id, 'product_id' => $this->item_product_id[$item]]);
            $PurchaseItem->user_id = $Purchase->user_id;
            $PurchaseItem->order_id = $Purchase->id;
            $PurchaseItem->product_id = $item;
            $PurchaseItem->name = $this->item_name[$item];
            $PurchaseItem->amount = $this->item_price[$item];
            $PurchaseItem->quantity = $this->item_quantity[$item];
            $PurchaseItem->discount_amount = $this->item_discount[$item];
            $PurchaseItem->subtotal = $this->item_subtotal[$item];
            $PurchaseItem->save();
        }

        $payment_item_rows = collect($this->payment_item_rows);

        if (count($this->payment_item_deleted_rows) > 0) {
            Transaction::whereIn('id', $this->payment_item_deleted_rows)->delete();
        }

        foreach ($payment_item_rows as $key => $payment_item) {
            if(isset($payment_item['transaction_id']) && $payment_item['transaction_id']){
                $PurchasePayment = Transaction::find($payment_item['transaction_id']);
            }else{
                $PurchasePayment = new Transaction();
            }

            $PurchasePayment->user_id = $Purchase->user_id;
            $PurchasePayment->order_id = $Purchase->id;
            $PurchasePayment->warehouse_id = $Purchase->warehouse_id;
            $PurchasePayment->outlet_id = $Purchase->outlet_id;
            $PurchasePayment->contact_id = $Purchase->contact_id;
            $PurchasePayment->flow = 2;
            $PurchasePayment->payment_method_id = $payment_item['payment_method_id'];
            $PurchasePayment->amount = $payment_item['payment_amount'];
            $PurchasePayment->charge = $payment_item['payment_charge'];
            $PurchasePayment->net_amount = $payment_item['payment_net_amount'];
            $PurchasePayment->ref = $payment_item['payment_ref'];
            $PurchasePayment->txn_date = $payment_item['txn_date'];
            $PurchasePayment->save();
            $payment_item['transaction_id'] = $PurchasePayment->id;

            $payment_item_rows->put($key, $payment_item);
            $this->payment_item_rows = $payment_item_rows;
        }

       if ($storeType == 'new') {
            $this->purchaseReset();
        } else {
            $this->purchase_id = $Purchase->id;
        }

        $this->dispatch('print', [
            'url' => route('invoice.purchase',['id' => $Purchase->id]),
        ]);

        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');
    }
    public function purchaseReset()
    {
        $this->reset();
        $this->resetValidation();
        $this->code = str_pad((Order::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
    }

    #[On('openProductModal')]
    public function openProductModal($data = [])
    {
        $this->dispatch('modalOpen', 'productModal');
    }

    public function addPayment()
    {
        $this->validate([
            'txn_date' => 'required',
            'payment_amount' => 'required',
            'payment_ref' => 'nullable|string',
            'payment_method_id' => 'required',
        ]);

        $payment_item_rows = collect($this->payment_item_rows);

        if($this->due_amount <= 0 || $this->due_amount < $this->payment_amount){
            $this->alert('error', 'Payment Amount is greater than Due Amount!');
            return true;
        }

        $payment_item_rows->push([
            'transaction_id' => null,
            'payment_method_id' => $this->payment_method_id,
            'payment_method_name' => $this->payment_method_id ? PaymentMethod::find($this->payment_method_id)->name : null,
            'payment_ref' => $this->payment_ref,
            'payment_amount' => $this->payment_amount,
            'payment_charge' => $this->payment_charge,
            'payment_net_amount' => $this->payment_net_amount,
            'txn_date' => $this->txn_date,
        ]);

        $this->payment_item_rows = $payment_item_rows;

        $this->paymentReset();
        $this->paymentAmountUpdate();
        $this->rowsUpdate();
    }


    public function removePaymentItem($index)
    {
        $payment_item_rows = collect($this->payment_item_rows);
        $this->payment_item_deleted_rows[] = $payment_item_rows[$index]['transaction_id'];
        $payment_item_rows->forget($index);
        $this->payment_item_rows = array_values($payment_item_rows->toArray());

        $this->paymentAmountUpdate();
        $this->rowsUpdate();
    }

    public function paymentReset()
    {
        $this->reset([
            'payment_method_id',
            'payment_ref',
            'payment_amount',
            'payment_charge',
            'payment_net_amount',
            'txn_date',
        ]);

        $this->resetValidation();
        $this->txn_date = now()->format('Y-m-d');
    }

    public function updatedPaymentAmount($value)
    {
        $this->paymentAmountUpdate();
    }

    public function updatedPaymentCharge($value)
    {
        $this->paymentAmountUpdate();
    }

    public function paymentAmountUpdate()
    {
        $payment_amount = $this->payment_amount > 0 ? $this->payment_amount : 0;
        $payment_charge = $this->payment_charge > 0 ? $this->payment_charge : 0;
        $this->payment_net_amount = $payment_amount + $payment_charge;
    }

    public function mount()
    {
        $lastPurchase = Order::latest()->orderByDesc('id')->first();

    if ($lastPurchase) {
        $lastCode = $lastPurchase->code;
        $newCodeNumber = intval($lastCode) + 1;
        $this->code = str_pad($newCodeNumber, strlen($lastCode), '0', STR_PAD_LEFT);
    } else {
        $this->code = '001';
    }

        if ($this->purchase_id) {
            $Purchase = Order::find($this->purchase_id);
            if($Purchase){
                $this->code = $Purchase->code;
                $this->ref = $Purchase->ref;
                $this->warehouse_id = $Purchase->warehouse_id;
                $this->outlet_id = $Purchase->outlet_id;
                $this->contact_id = $Purchase->contact_id;
                $this->payment_status = $Purchase->payment_status;
                $this->payment_date = $Purchase->payment_date;
                $this->pmid = $Purchase->pmid;
                $this->order_date = $Purchase->order_date;
                $this->delivery_status = $Purchase->delivery_status;
                $this->discount_amount = numberFormat($Purchase->discount_amount)??0;
                $this->vat_amount = numberFormat($Purchase->vat_amount);
                $this->shipping_charge = numberFormat($Purchase->shipping_charge);
                $this->subtotal = $Purchase->subtotal;
                $this->net_amount = $Purchase->net_amount;
                $this->additional_charge = $Purchase->additional_charge;
                $this->paid_amount = $Purchase->paid_amount;
                $this->due_amount = $Purchase->due_amount;

                foreach ($Purchase->OrderItem as $key => $OrderItem) {
                    $item_rows = collect($this->item_rows);
                    $item_rows->push($OrderItem->product_id);
                    $this->item_rows = $item_rows;
                    $this->item_product_id[$OrderItem->product_id] = $OrderItem->product_id;
                    $this->item_name[$OrderItem->product_id] = $OrderItem->name;
                    $this->item_code[$OrderItem->product_id] = $OrderItem->Product->code;
                    $this->item_price[$OrderItem->product_id] = numberFormat($OrderItem->amount);
                    $this->item_quantity[$OrderItem->product_id] = $OrderItem->quantity;
                    $this->item_discount[$OrderItem->product_id] = numberFormat($OrderItem->discount)??0;
                    $this->item_subtotal[$OrderItem->product_id] = numberFormat($OrderItem->subtotal);
                }

                foreach ($Purchase->Transaction as $key => $Transaction) {
                    $payment_item_rows = collect($this->payment_item_rows);
                    $payment_item_rows->push([
                        'transaction_id' => $Transaction->id,
                        'payment_method_id' => $Transaction->payment_method_id,
                        'payment_method_name' => $Transaction->payment_method_id ? PaymentMethod::find($Transaction->payment_method_id)->name : null,
                        'payment_ref' => $Transaction->ref,
                        'payment_amount' => numberFormat($Transaction->amount),
                        'payment_charge' => numberFormat($Transaction->charge),
                        'payment_net_amount' => numberFormat($Transaction->net_amount),
                        'txn_date' => $Transaction->txn_date ? $Transaction->txn_date->format('Y-m-d') : null,
                    ]);

                    $this->payment_item_rows = $payment_item_rows;
                }

            }
        }
    }

    public function render()
    {
        $payment = OrderItem::all();
        $product = Product::all();
        $transaction = Transaction::all();
        $outlet = Outlet::all();
        $warehouse = Warehouse::all();
        return view('pages.backend.order.purchase-details', compact( 'payment',  'product', 'transaction', 'outlet', 'warehouse'));
    }
}

<?php

namespace App\Pages\Backend\Order;


use App\Models\Order\Order;
use Livewire\Attributes\On;
use App\Http\Common\Component;
use App\Models\Order\Delivery;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Accounting\Transaction;


#[Layout('layouts.backend')]
class SaleList extends Component
{
    public $challan_id;
    public $payment_id;

    public $vehicle_type;
    public $person_name;
    public $code;
    public $mobile;
    public $name;
    public $ref;
    public $quantity;
    public $product_id;
    public $note;
    public $payment_method_id;
    public $net_amount;
    public $charge;
    public $txn_date;
    public $status = 1;

    #[On('openDeliveryModal')]
    public function openDeliveryModal($data = [])
    {
        $this->challanReset();
        $this->dispatch('modalOpen', 'deliveryModal');
    }
    #[On('openPaymentModal')]
    public function openPaymentModal($data = [])
    {
        $this->challanReset();
        $this->dispatch('modalOpen', 'paymentModal');
    }

    public function storeDelivery($storeType = null)
    {
        $this->validate([
            'code' => 'required|string',
        ]);

        $DeliveryChallan = Delivery::findOrNew($this->challan_id);
        if ($this->challan_id) {
            $message = 'Delivery Challan Updated Successfully!';
        } else {
            $message = 'Delivery Challan Added Successfully!';
            $DeliveryChallan->user_id = Auth::id();
        }

        $DeliveryChallan->code = $this->code;
        $DeliveryChallan->person_name = $this->person_name;
        $DeliveryChallan->mobile = $this->mobile ?? 0;
        $DeliveryChallan->vehicle_type = $this->vehicle_type ?? 0;
        $DeliveryChallan->note = $this->note ?? 0;
        $DeliveryChallan->ref = $this->ref ?? 0;
        $DeliveryChallan->status = $this->status ?? 0;
        $DeliveryChallan->save();

        $DeliveryInfo = $DeliveryChallan->DeliveryItem()->firstOrCreate();
        $DeliveryInfo->user_id =  $DeliveryChallan->user_id;
        $DeliveryInfo->delivery_id = $DeliveryChallan->id;
        $DeliveryInfo->product_id = $this->product_id ?? 0;
        $DeliveryInfo->quantity = $this->quantity ?? 0;
        $DeliveryInfo->save();

        if ($storeType == 'new') {
            $this->challanReset();
        } else {
            $this->challan_id = $DeliveryChallan->id;
        }
        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');
    }
    public function challanReset()
    {
        $this->reset();
        $this->resetValidation();
        $this->code = str_pad((Delivery::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
    }
    public function paymentReset()
    {
        $this->reset();
        $this->resetValidation();
        $this->code = str_pad((Transaction::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
    }

    public function addPayment($storeType = null){
        $this->validate([
            'payment_method_id' => 'required',
        ]);

        $Payment = Transaction::findOrNew($this->payment_id);
        if($this->payment_id) {
            $message = 'Payment Updated Successfully!';
        } else {
            $message = 'Payment Added Successfully!';
            $Payment->user_id = Auth::id();
        }

        $Payment->code = $this->code;
        $Payment->payment_method_id = $this->payment_method_id;
        $Payment->net_amount = $this->net_amount;
        $Payment->charge = $this->charge;
        $Payment->ref = $this->ref;
        $Payment->txn_date = $this->txn_date;
        $Payment->save();

        if($storeType == 'new'){
            $this->paymentReset();
        }else{
            $this->payment_id = $Payment-> id;
        }
        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');
    }



    #[On('saleDelete')]
    public function destroy($data)
    {
        $data = $this->alertConfirm($data, 'Are you sure to delete Sale?');

        if (isset($data['id'])) {
            $Sale = Order::find($data['id']);

            if (!$Sale) {
                $this->alert('error', 'Sale Not Found!!');
                return;
            }

            $Sale->delete();

            $this->alert('success', 'Sale Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }
    }
    public function render()
    {
        $transaction = Transaction::all();
        return view('pages.backend.order.sale-list',compact('transaction'));
    }
}

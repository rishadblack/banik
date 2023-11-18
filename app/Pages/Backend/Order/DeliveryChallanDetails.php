<?php

namespace App\Pages\Backend\Order;


use Livewire\Attributes\Url;
use App\Http\Common\Component;
use App\Models\Order\Delivery;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;


#[Layout('layouts.backend')]
class DeliveryChallanDetails extends Component
{
    #[Url]
    public $challan_id;

    public $vehicle_type;
    public $person_name;
    public $code;
    public $mobile;
    public $name;
    public $ref;
    public $quantity;
    public $product_id;
    public $note;
    public $status = 1;

    public function storeDelivery($storeType = null)
    {
    $this->validate([
        'code' => 'required|string',
    ]);

    $DeliveryChallan = Delivery::findOrNew($this->challan_id);
    if($this->challan_id){
        $message = 'Delivery Challan Updated Successfully!';
    } else {
        $message = 'Delivery Challan Added Successfully!';
        $DeliveryChallan->user_id = Auth::id();
    }

    $DeliveryChallan->code = $this->code;
    $DeliveryChallan->person_name = $this->person_name;
    $DeliveryChallan->mobile = $this->mobile??0;
    $DeliveryChallan->vehicle_type = $this->vehicle_type??0;
    $DeliveryChallan->note = $this->note??0;
    $DeliveryChallan->ref = $this->ref??0;
    $DeliveryChallan->status = $this->status??0;
    $DeliveryChallan->save();

    $DeliveryInfo = $DeliveryChallan->DeliveryItem()->firstOrCreate();
    $DeliveryInfo->user_id =  $DeliveryChallan->user_id;
    $DeliveryInfo->delivery_id = $DeliveryChallan->id;
    $DeliveryInfo->product_id = $this->product_id??0;
    $DeliveryInfo->quantity = $this->quantity??0;
    $DeliveryInfo->save();

    if($storeType == 'new'){
        $this->challanReset();
    }else{
        $this->challan_id = $DeliveryChallan->id;
    }
    $this->alert('success',$message);
    $this->dispatch('refreshDatatable');
}
public function challanReset()
{
    $this->reset();
    $this->resetValidation();
    $this->code = str_pad((Delivery::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
}

public function mount()
{
    if($this->challan_id) {
        $DeliveryChallan = Delivery::find($this->challan_id);
        $this->code = $DeliveryChallan->code;
        $this->person_name = $DeliveryChallan->person_name;
        $this->mobile = $DeliveryChallan->mobile;
        $this->vehicle_type = $DeliveryChallan->vehicle_type;
        $this->note = $DeliveryChallan->note;
        $this->ref = $DeliveryChallan->ref;
        $this->status = $DeliveryChallan->status;

        $this->name = $DeliveryChallan->DeliveryItem->name;
        $this->product_id = $DeliveryChallan->DeliveryItem->product_id;
        $this->quantity = $DeliveryChallan->DeliveryItem->quantity;
    }else {
        $this->challanReset();
    }
}


    public function render()
    {
        return view('pages.backend.order.delivery-challan-details');
    }
}

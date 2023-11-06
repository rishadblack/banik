<?php

namespace App\Pages\Backend\Order;


use Livewire\Attributes\Url;
use App\Http\Common\Component;
use App\Models\Order\Delivery;
use Livewire\Attributes\Layout;
use App\Models\Order\DeliveryItem;
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
    public $quantity;
    public $note;

    public function storeDelivery($storeType = null)
    {
    $this->validate([
        'code' => 'required|string',
    ]);

    $Delivery = Delivery::findOrNew($this->challan_id);
    $Delivery->user_id = Auth::id();
    $Delivery->code = $this->code;
    $Delivery->person_name = $this->person_name;
    $Delivery->mobile = $this->mobile;
    $Delivery->vehicle_type = $this->vehicle_type;
    $Delivery->note = $this->note;
    $Delivery->save();

    $DeliveryItem = DeliveryItem::findOrNew($this->challan_id);
    $DeliveryItem->user_id = Auth::id();
    $DeliveryItem->delivery_id = $Delivery->id;
    $DeliveryItem->name = $this->code;
    $DeliveryItem->quantity = $this->quantity;
    $DeliveryItem->save();

    if($storeType == 'new'){
        $this->reset();
    }else{
        $this->challan_id = $Delivery->id;
    }

    if($this->challan_id){
        $message = 'Delivery Challan Updated Successfully!';
    } else {
        $message = 'Delivery Challan Added Successfully!';
    }
    $this->alert('success',$message);
}

public function mount()
{
    if($this->challan_id) {
        $Delivery = Delivery::find($this->challan_id);
        $this->code = $Delivery->code;
        $this->person_name = $Delivery->person_name;
        $this->mobile = $Delivery->mobile;
        $this->vehicle_type = $Delivery->vehicle_type;
        $this->note = $Delivery->note;

        $DeliveryItem = DeliveryItem::find($this->challan_id);
        $this->name = $DeliveryItem->name;
        $this->quantity = $DeliveryItem->quantity;
    }
}


    public function render()
    {
        return view('pages.backend.order.delivery-challan-details');
    }
}

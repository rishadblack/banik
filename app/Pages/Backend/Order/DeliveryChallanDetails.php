<?php

namespace App\Pages\Backend\Order;


use Livewire\Attributes\Url;
use App\Http\Common\Component;
use App\Models\Order\Delivery;
use App\Models\Product\Product;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;


#[Layout('layouts.backend')]
class DeliveryChallanDetails extends Component
{
    #[Url]
    public $challan_id;

    public $search_product;

    public $vehicle_type;
    public $person_name;
    public $code;
    public $mobile;
    public $name;
    public $ref;
    public $subtotal;
    public $net_amount;
    public $discount;
    public $quantity;
    public $product_id;
    public $note;
    public $status = 1;

    public $item_rows = [];
    public $item_product_id = [];
    public $item_name = [];
    public $item_code = [];
    public $item_quantity = [];

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
        $this->item_quantity[$Product->id] = 1;

        $this->reset('search_product');
        $this->dispatch('search_product_reset');
    }

    public function updatedItemQuantity($value, $productId)
    {
        $this->ItemRowsUpdate($productId);
    }


    public function ItemRowsUpdate($productId)
    {

        $item_quantity = isset($this->item_quantity[$productId]) && $this->item_quantity[$productId] > 0 ? $this->item_quantity[$productId] : 1;

        $this->rowsUpdate();
    }

    public function rowsUpdate()
    {
        $item_quantity = collect($this->item_quantity)->sum();

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
        unset($this->item_quantity[$productId]);

        $this->rowsUpdate();
    }

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

    foreach ($this->item_rows as $key => $value) {
    $DeliveryInfo = $DeliveryChallan->DeliveryItem()->where('product_id',$this->item_product_id[$value])->firstOrNew(['delivery_id' => $DeliveryChallan->id, 'product_id' => $this->item_product_id[$value]]);
    $DeliveryInfo->user_id =  $DeliveryChallan->user_id;
    $DeliveryInfo->delivery_id = $DeliveryChallan->id;
    $DeliveryInfo->product_id = $value;
    $DeliveryInfo->name = $this->item_name[$value];
    $DeliveryInfo->quantity = $this->item_quantity[$value];
    $DeliveryInfo->save();
    }
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

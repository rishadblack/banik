<?php

namespace App\Pages\Backend\Order;

use Livewire\Attributes\On;
use App\Http\Common\Component;
use App\Models\Order\Delivery;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class DeliveryChallanList extends Component
{
    #[On('deliveryDelete')]
    public function destroy($data)
    {
        $data = $this->alertConfirm($data, 'Are you sure to delete Delivery Challan?');

        if(isset($data['id'])) {
            $Delivery = Delivery::find($data['id']);

            if(!$Delivery) {
                $this->alert('error', 'Delivery Not Found!!');
                return;
            }

            $Delivery->delete();

            $this->alert('success', 'Delivery Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.order.delivery-challan-list');
    }
}

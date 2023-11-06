<?php

namespace App\Pages\Backend\Order;


use App\Models\Order\Order;
use Livewire\Attributes\On;
use App\Http\Common\Component;
use App\Models\Order\Purchase;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class PurchaseList extends Component
{

    #[On('purchaseDelete')]
    public function destroy($data)
    {
        // $data = $this->alertConfirm($data, 'Are you sure to delete Purchase?');

        if(isset($data['id'])) {
            $Purchase = Order::find($data['id']);

            if(!$Purchase) {
                $this->alert('error', 'Purchase Not Found!!');
                return;
            }

            $Purchase->delete();

            $this->alert('success', 'Purchase Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.order.purchase-list');
    }
}

<?php

namespace App\Pages\Backend\Order;

use Livewire\Component;
use App\Models\Order\Order;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class PurchaseReturnList extends Component
{
    #[On('purchasereturnDelete')]
    public function destroy($data)
    {
        $data = $this->alertConfirm($data, 'Are you sure to delete Purchase Return?');

        if(isset($data['id'])) {
            $Purchase = Order::find($data['id']);

            if(!$Purchase) {
                $this->alert('error', 'Purchase Return Not Found!!');
                return;
            }

            $Purchase->delete();

            $this->alert('success', 'Purchase Return Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }

    public function render()
    {
        return view('pages.backend.order.purchase-return-list');
    }
}

<?php

namespace App\Pages\Backend\Order;

use Livewire\Component;
use App\Models\Order\Order;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class SalesReturnList extends Component
{

    #[On('salereturnDelete')]
    public function destroy($data)
    {
        $data = $this->alertConfirm($data, 'Are you sure to delete Sale Return?');

        if(isset($data['id'])) {
            $Sale = Order::find($data['id']);

            if(!$Sale) {
                $this->alert('error', 'Sale Return Not Found!!');
                return;
            }

            $Sale->delete();

            $this->alert('success', 'Sale Return Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.order.sales-return-list');
    }
}

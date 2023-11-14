<?php

namespace App\Pages\Backend\Order;

use Livewire\Component;
use App\Models\Order\Sale;
use App\Models\Order\Order;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class SaleList extends Component
{
    public $sales;


    #[On('saleDelete')]
    public function destroy($data)
    {
        // $data = $this->alertConfirm($data, 'Are you sure to delete Sale?');

        if(isset($data['id'])) {
            $Sale = Order::find($data['id']);

            if(!$Sale) {
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
        return view('pages.backend.order.sale-list');
    }
}

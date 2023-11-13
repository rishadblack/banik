<?php

namespace App\Pages\Backend\Inventory;


use Livewire\Attributes\On;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use App\Models\Inventory\StockReceipt;
use App\Models\Inventory\StockTransfer;


#[Layout('layouts.backend')]
class StockMovementList extends Component
{
    #[On('stockTransferDelete')]
    public function destroy($data)
    {
        // $data = $this->alertConfirm($data, 'Are you sure to delete Transfer?');

        if(isset($data['id'])) {
            $Transfer = StockReceipt::find($data['id']);

            if(!$Transfer) {
                $this->alert('error', 'Transfer Not Found!!');
                return;
            }

            $Transfer->delete();

            $this->alert('success', 'Transfer Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.inventory.stock-movement-list');
    }
}

<?php

namespace App\Pages\Backend\Inventory;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use App\Models\Inventory\StockReceipt;
use App\Models\Inventory\StockAdjustment;


#[Layout('layouts.backend')]
class StockAdjustmentList extends Component
{
    #[On('adjustmentDelete')]
    public function destroy($data)
    {
       $data = $this->alertConfirm($data, 'Are you sure to delete Stock Adjustment?');

        if(isset($data['id'])) {
            $Adjustment = StockReceipt::find($data['id']);

            if(!$Adjustment) {
                $this->alert('error', 'Adjustment Not Found!!');
                return;
            }

            $Adjustment->delete();

            $this->alert('success', 'Adjustment Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.inventory.stock-adjustment-list');
    }
}

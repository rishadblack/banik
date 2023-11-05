<?php

namespace App\Pages\Backend\Inventory;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use App\Models\Inventory\StockTransfer;


#[Layout('layouts.backend')]
class StockMovementList extends Component
{
    #[On('couponDelete')]
    public function destroy($data)
    {
        // $data = $this->alertConfirm($data, 'Are you sure to delete Coupon?');

        if(isset($data['id'])) {
            $Coupon = StockTransfer::find($data['id']);

            if(!$Coupon) {
                $this->alert('error', 'Coupon Not Found!!');
                return;
            }

            $Coupon->delete();

            $this->alert('success', 'Coupon Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.inventory.stock-movement-list');
    }
}

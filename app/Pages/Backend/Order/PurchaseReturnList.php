<?php

namespace App\Pages\Backend\Order;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class PurchaseReturnList extends Component
{
    #[On('couponDelete')]
    public function destroy($data)
    {
        // $data = $this->alertConfirm($data, 'Are you sure to delete Coupon?');

        /*if(isset($data['id'])) {
            $Coupon = Coupon::find($data['id']);

            if(!$Coupon) {
                $this->alert('error', 'Coupon Not Found!!');
                return;
            }

            $Coupon->delete();

            $this->alert('success', 'Coupon Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }*/

    }
    public function render()
    {
        return view('pages.backend.order.purchase-return-list');
    }
}

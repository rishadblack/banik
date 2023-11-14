<?php

namespace App\Pages\Backend\Order;

use App\Models\Order\Order;
use Livewire\Attributes\On;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class QuotationList extends Component
{
    #[On('quotationDelete')]
    public function destroy($data)
    {
        $data = $this->alertConfirm($data, 'Are you sure to delete Quotation?');

        if(isset($data['id'])) {
            $Purchase = Order::find($data['id']);

            if(!$Purchase) {
                $this->alert('error', 'Quotation Not Found!!');
                return;
            }

            $Purchase->delete();

            $this->alert('success', 'Quotation Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {

        return view('pages.backend.order.quotation-list');
    }
}

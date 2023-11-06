<?php

namespace App\Pages\Backend\Setting;


use Livewire\Attributes\On;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use App\Models\Setting\PaymentMethod;


#[Layout('layouts.backend')]
class PaymentList extends Component
{
    #[On('paymentMethodDelete')]
    public function destroy($data)
    {
        // $data = $this->alertConfirm($data, 'Are you sure to delete Payment?');

        if(isset($data['id'])) {
            $Payment = PaymentMethod::find($data['id']);

            if(!$Payment) {
                $this->alert('error', 'Payment Method Not Found!!');
                return;
            }

            $Payment->delete();

            $this->alert('success', 'Payment Method Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.setting.payment-list');
    }
}

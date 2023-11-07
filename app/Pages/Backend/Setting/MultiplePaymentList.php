<?php

namespace App\Pages\Backend\Setting;


use Livewire\Attributes\On;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use App\Models\Accounting\Transaction;


#[Layout('layouts.backend')]
class MultiplePaymentList extends Component
{
    #[On('transactionDelete')]
    public function destroy($data)
    {
        // $data = $this->alertConfirm($data, 'Are you sure to delete Outlet?');

        if(isset($data['id'])) {
            $Transaction = Transaction::find($data['id']);

            if(!$Transaction) {
                $this->alert('error', 'Transaction Not Found!!');
                return;
            }

            $Transaction->delete();

            $this->alert('success', 'Transaction Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.setting.multiple-payment-list');
    }
}

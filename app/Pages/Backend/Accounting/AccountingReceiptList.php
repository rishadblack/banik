<?php

namespace App\Pages\Backend\Accounting;

use Livewire\Attributes\On;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use App\Models\Accounting\Receipt;

#[Layout('layouts.backend')]
class AccountingReceiptList extends Component
{
    #[On('receiptDelete')]
    public function destroy($data)
    {
        // $data = $this->alertConfirm($data, 'Are you sure to delete Ledger Account?');

        if(isset($data['id'])) {
            $ReceiptType = Receipt::find($data['id']);

            if(!$ReceiptType) {
                $this->alert('error', 'Account Receipt Not Found!!');
                return;
            }

            $ReceiptType->delete();

            $this->alert('success', 'Account Receipt Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.accounting.accounting-receipt-list');
    }
}

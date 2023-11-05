<?php

namespace App\Pages\Backend\Accounting;

use Livewire\Attributes\On;

use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use App\Models\Accounting\LedgerAccount;

#[Layout('layouts.backend')]

class LedgerAccountList extends Component
{
    #[On('ledgerAccountDelete')]
    public function destroy($data)
    {
        // $data = $this->alertConfirm($data, 'Are you sure to delete Ledger Account?');

        if(isset($data['id'])) {
            $Ledger = LedgerAccount::find($data['id']);

            if(!$Ledger) {
                $this->alert('error', 'Ledger Account Not Found!!');
                return;
            }

            $Ledger->delete();

            $this->alert('success', 'Ledger Account Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.accounting.ledger-account-list');
    }
}

<?php

namespace App\Pages\Backend\Accounting;

use Livewire\Attributes\On;

use Livewire\Attributes\Url;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Accounting\LedgerAccount;
use App\Models\Accounting\ChartOfAccount;

#[Layout('layouts.backend')]

class LedgerAccountList extends Component
{
    #[Url]
    public $ledger_account_id;
    public $ledger_code;
    public $chart_of_account_id;
    public $name;


    public function storeLedgerAccount($storeType = null)
    {
    $this->validate([
        'name' => 'required|string',
        'ledger_code' => 'required|string',
    ]);

    $Ledger = LedgerAccount::findOrNew($this->ledger_account_id);
    $Ledger->user_id = Auth::id();
    $Ledger->ledger_code = $this->ledger_code;
    $Ledger->chart_of_account_id = $this->chart_of_account_id;
    $Ledger->name = $this->name;
    $Ledger->save();

    if($storeType == 'new'){
        $this->reset();
    }else{
        $this->ledger_account_id = $Ledger-> id;
    }
    if($this->ledger_account_id) {
        $message = 'Stock Ledger Account Updated Successfully!';
    } else {
        $message = 'Stock Ledger Account Added Successfully!';
    }

    $this->alert('success', $message);
}

public function mount()
{
    if($this->ledger_account_id) {
        $Ledger = LedgerAccount::find($this->ledger_account_id);
        $this->ledger_code = $Ledger->ledger_code;
        $this->chart_of_account_id = $Ledger->chart_of_account_id;
        $this->name = $Ledger->name;
    }
}


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
            // $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        $chart = ChartOfAccount::all();
        return view('pages.backend.accounting.ledger-account-list',compact('chart'));
    }
}

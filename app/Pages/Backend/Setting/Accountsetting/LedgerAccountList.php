<?php

namespace App\Pages\Backend\Setting\Accountsetting;

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

    public $ledger_account_id;
    public $ledger_code;
    public $chart_of_account_id;
    public $name;
    public $status = 1;


    #[On('openLedgerAccountModal')]
    public function openLedgerAccountModal($data = [])
    {
        $this->ledgerReset();

        if(isset($data['id'])) {
            $Ledger = LedgerAccount::find($data['id']);

            if(!$Ledger) {
                $this->alert('error', 'Ledger Account Not Found!!');
                return;
            }

            $this->ledger_account_id = $Ledger->id;
            $this->name = $Ledger->name;
            $this->ledger_code = $Ledger->ledger_code;
            $this->chart_of_account_id = $Ledger->chart_of_account_id;
            $this->status = $Ledger->status;
        }

        $this->dispatch('modalOpen', 'ledgerModal');
    }

    public function ledgerReset()
    {
        $this->reset();
        $this->resetValidation();
        $this->ledger_code = str_pad((LedgerAccount::latest()->orderByDesc('id')->first()?->ledger_code + 1), 3, '0', STR_PAD_LEFT);
    }

    public function storeLedgerAccount($storeType = null)
    {
    $this->validate([
        'name' => 'required|string',
        'ledger_code' => 'required|string',
    ]);

    $Ledger = LedgerAccount::findOrNew($this->ledger_account_id);
    if($this->ledger_account_id) {
        $message = 'Stock Ledger Account Updated Successfully!';
    } else {
        $message = 'Stock Ledger Account Added Successfully!';
        $Ledger->user_id = Auth::id();
    }

    $Ledger->ledger_code = $this->ledger_code;
    $Ledger->chart_of_account_id = $this->chart_of_account_id;
    $Ledger->name = $this->name;
    $Ledger->status = $this->status;
    $Ledger->save();

    if($storeType == 'new'){
        $this->ledgerReset();
    }else{
        $this->ledger_account_id = $Ledger-> id;
    }


    $this->alert('success', $message);
    $this->dispatch('refreshDatatable');
}


    #[On('ledgerAccountDelete')]
    public function destroy($data)
    {

        $data = $this->alertConfirm($data, 'Are you sure to delete Ledger Account?');

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
        $chart = ChartOfAccount::all();
        return view('pages.backend.setting.accountsetting.ledger-account-list',compact('chart'));
    }
}

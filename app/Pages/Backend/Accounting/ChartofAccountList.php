<?php

namespace App\Pages\Backend\Accounting;


use Livewire\Attributes\On;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use App\Models\Accounting\ChartOfAccount;

#[Layout('layouts.backend')]
class ChartofAccountList extends Component
{
    #[On('chartOfAccountDelete')]
    public function destroy($data)
    {

        if(isset($data['id'])) {
            $ChartOfAccount = ChartOfAccount::find($data['id']);

            if(!$ChartOfAccount) {
                $this->alert('error', 'Chart Of Account Not Found!!');
                return;
            }

            $ChartOfAccount->delete();

            $this->alert('success', 'Chart Of Account Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.accounting.chartof-account-list');
    }
}

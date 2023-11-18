<?php

namespace App\Pages\Backend\Accounting;


use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Accounting\ChartOfAccount;

#[Layout('layouts.backend')]
class ChartofAccountList extends Component
{
    public $chartaccount_id;
    public $code;
    public $name;
    public $status = 1;

    #[On('openChartOfAccountModal')]
    public function openChartOfAccountModal($data = [])
    {
        $this->chartReset();

        if(isset($data['id'])) {
            $ChartOfAccount = ChartOfAccount::find($data['id']);

            if(!$ChartOfAccount) {
                $this->alert('error', 'Chart Of Account Not Found!!');
                return;
            }

            $this->chartaccount_id = $ChartOfAccount->id;
            $this->name = $ChartOfAccount->name;
            $this->code = $ChartOfAccount->code;
            $this->status = $ChartOfAccount->status;
        }

        $this->dispatch('modalOpen', 'chartModal');
    }

    public function chartReset()
    {
        $this->reset();
        $this->resetValidation();
        $this->code = str_pad((ChartOfAccount::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
    }


    public function storeChartOfAccount($storeType = null)
    {
        $this->validate([
            'code' => 'required|string',
            'name' => 'required|string',
        ]);

        $ChartOfAccount = ChartOfAccount::findOrNew($this->chartaccount_id);
        if ($this->chartaccount_id) {
            $message = 'ChartOfAccount Updated Successfully!';
        } else {
            $message = 'ChartOfAccount Added Successfully!';
            $ChartOfAccount->user_id = Auth::id();
        }

        $ChartOfAccount->code = $this->code;
        $ChartOfAccount->name = $this->name;
        $ChartOfAccount->status = $this->status;
        $ChartOfAccount->save();

        if ($storeType == 'new') {
            $this->chartReset();
        } else {
            $this->chartaccount_id = $ChartOfAccount->id;
        }


        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');
    }

    #[On('chartOfAccountDelete')]
    public function destroy($data)
    {
        $data = $this->alertConfirm($data, 'Are you sure to delete Chart Of Account?');

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

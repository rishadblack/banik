<?php

namespace App\Pages\Backend\Accounting;


use Livewire\Attributes\Url;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Accounting\ChartOfAccount;

#[Layout('layouts.backend')]
class ChartofAccountDetails extends Component
{

    public $chartaccount_id;
    public $country_id;
    public $division_id;
    public $code;
    public $name;
    public $address;
    public $upazila_id;
    public $district_id;
    public function storeChartOfAccount($storeType = null)
    {
        $this->validate([
            'code' => 'required|string',
            'name' => 'required|string',
        ]);

        $ChartOfAccount = ChartOfAccount::findOrNew($this->chartaccount_id);
        $ChartOfAccount->user_id = Auth::id();
        $ChartOfAccount->code = $this->code;
        $ChartOfAccount->name = $this->name;
        $ChartOfAccount->save();

        if ($storeType == 'new') {
            $this->reset();
        } else {
            $this->chartaccount_id = $ChartOfAccount->id;
        }
        if ($this->chartaccount_id) {
            $message = 'ChartOfAccount Updated Successfully!';
        } else {
            $message = 'ChartOfAccount Added Successfully!';
        }

        $this->alert('success', $message);
    }

    public function mount()
    {
        if($this->chartaccount_id) {
            $ChartOfAccount = ChartOfAccount::find($this->chartaccount_id);
            $this->code = $ChartOfAccount->code;
            $this->name = $ChartOfAccount->name;
        }
    }
    public function render()
    {
        return view('pages.backend.accounting.chartof-account-details');
    }
}

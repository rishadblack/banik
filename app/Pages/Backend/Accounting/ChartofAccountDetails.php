<?php

namespace App\Pages\Backend\Accounting;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.backend')]
class ChartofAccountDetails extends Component
{
    public $chartaccount_id;
    public function render()
    {
        return view('pages.backend.accounting.chartof-account-details');
    }
}

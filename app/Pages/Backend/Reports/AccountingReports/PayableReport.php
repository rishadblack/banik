<?php

namespace App\Pages\Backend\Reports\AccountingReports;

use App\Http\Common\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.backend')]

class PayableReport extends Component
{
    public function render()
    {
        return view('pages.backend.reports.accounting-reports.payable-report');
    }
}

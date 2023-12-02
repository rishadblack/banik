<?php

namespace App\Pages\Backend\Reports\OrderReports;

use App\Http\Common\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.backend')]
class SalesReport extends Component
{
    public function render()
    {
        return view('pages.backend.reports.order-reports.sales-report');
    }
}

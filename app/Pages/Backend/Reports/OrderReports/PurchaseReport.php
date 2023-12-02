<?php

namespace App\Pages\Backend\Reports\OrderReports;


use App\Http\Common\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.backend')]
class PurchaseReport extends Component
{
    public function render()
    {
        return view('pages.backend.reports.order-reports.purchase-report');
    }
}

<?php

namespace App\Pages\Backend\Reports\InventoryReports;

use App\Http\Common\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.backend')]

class StockTransferReport extends Component
{
    public function render()
    {
        return view('pages.backend.reports.inventory-reports.stock-transfer-report');
    }
}

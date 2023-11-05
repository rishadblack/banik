<?php

namespace App\Pages\Backend\Accounting;

use App\Http\Common\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.backend')]

class AccountingReceiptDetails extends Component
{
    public $accountingreceipt_id;
    public function render()
    {
        return view('pages.backend.accounting.accounting-receipt-details');
    }
}

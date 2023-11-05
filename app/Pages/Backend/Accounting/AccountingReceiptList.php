<?php

namespace App\Pages\Backend\Accounting;

use App\Http\Common\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.backend')]
class AccountingReceiptList extends Component
{
    public function render()
    {
        return view('pages.backend.accounting.accounting-receipt-list');
    }
}

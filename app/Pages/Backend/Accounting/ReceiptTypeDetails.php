<?php

namespace App\Pages\Backend\Accounting;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.backend')]
class ReceiptTypeDetails extends Component
{
    public $receiptType_id;
    public function render()
    {
        return view('pages.backend.accounting.receipt-type-details');
    }
}

<?php

namespace App\Pages\Backend\Accounting;


use Livewire\Attributes\Url;
use App\Http\Common\Component;
use App\Models\Accounting\LedgerAccount;
use Livewire\Attributes\Layout;

#[Layout('layouts.backend')]
class LedgerAccountDetails extends Component
{
    #[Url]
    public $ledger_account_id;
    public $ledger_code;
    public $particular;
    public $reference;
    public $outlet;
    public $date;
    public $customer_supplier;
    public $stock_adjustment_status;
    public $note;
    public $quantity;
    public $adjustment_amount;
    public $cost_price;
    public $discount;
    public $biller_id;

    public function storeLedgerAccount($storeType = null)
    {
    $this->validate([
        'outlet' => 'required|string',
        'ledger_code' => 'required|string',
    ]);

    $Ledger = LedgerAccount::findOrNew($this->ledger_account_id);
    $Ledger->ledger_code = $this->ledger_code;
    $Ledger->particular = $this->particular;
    $Ledger->reference = $this->reference;
    $Ledger->outlet = $this->outlet;
    $Ledger->note = $this->note;
    $Ledger->date = $this->date;
    $Ledger->biller_id = $this->biller_id;
    $Ledger->customer_supplier = $this->customer_supplier;
    $Ledger->stock_adjustment_status = $this->stock_adjustment_status;
    $Ledger->save();

    if($storeType == 'new'){
        $this->reset();
    }else{
        $this->ledger_account_id = $Ledger-> id;
    }
    if($this->ledger_account_id) {
        $message = 'Stock Ledger Account Updated Successfully!';
    } else {
        $message = 'Stock Ledger Account Added Successfully!';
    }

    $this->alert('success', $message);
}

public function mount()
{
    if($this->ledger_account_id) {
        $Ledger = LedgerAccount::find($this->ledger_account_id);
        $this->ledger_code = $Ledger->ledger_code;
        $this->particular = $Ledger->particular;
        $this->reference = $Ledger->reference;
        $this->outlet = $Ledger->outlet;
        $this->note = $Ledger->note;
        $this->date = $Ledger->date;
        $this->biller_id = $Ledger->biller_id;
        $this->customer_supplier = $Ledger->customer_supplier;
        $this->stock_adjustment_status = $Ledger->stock_adjustment_status;
    }
}
    public function render()
    {
        return view('pages.backend.accounting.ledger-account-details');
    }
}

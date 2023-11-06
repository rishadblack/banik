<?php

namespace App\Pages\Backend\Accounting;

use Livewire\Attributes\Url;
use App\Http\Common\Component;
use App\Models\Contact\Contact;
use Livewire\Attributes\Layout;
use App\Models\Accounting\Receipt;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting\PaymentMethod;
use App\Models\Accounting\ReceiptType;
use App\Models\Accounting\LedgerAccount;

#[Layout('layouts.backend')]

class AccountingReceiptDetails extends Component
{
    #[Url]
    public $accountingreceipt_id;
    public $ledger_account_id;
    public $flow_type;
    public $code;
    public $contact_id;
    public $receipt_type_id;
    public $payment_method_id;
    public $amount;
    public $note;
    public function storeReceipt($storeType = null)
    {
        $this->validate([
            'code' =>'required|string',
        ]);

        $Receipt = Receipt::findOrNew($this->accountingreceipt_id);
        $Receipt->user_id = Auth::id();
        $Receipt->code = $this->code;
        $Receipt->ledger_account_id = $this->ledger_account_id;
        $Receipt->flow_type = $this->flow_type;
        $Receipt->contact_id = $this->contact_id;
        $Receipt->receipt_type_id = $this->receipt_type_id;
        $Receipt->payment_method_id = $this->payment_method_id;
        $Receipt->amount = $this->amount;
        $Receipt->note = $this->amount;
        $Receipt->save();

        if ($storeType == 'new') {
            $this->reset();
        } else {
            $this->accountingreceipt_id = $Receipt->id;
        }
        if ($this->accountingreceipt_id) {
            $message = 'Receipt Updated Successfully!';
        } else {
            $message = 'Receipt Added Successfully!';
        }

        $this->alert('success', $message);
    }

    public function mount()
    {
        if($this->accountingreceipt_id) {
            $Receipt = Receipt::find($this->accountingreceipt_id);
            $this->code = $Receipt->code;
            $this->ledger_account_id = $Receipt->ledger_account_id;
            $this->flow_type = $Receipt->flow_type;
            $this->contact_id = $Receipt->contact_id;
            $this->receipt_type_id = $Receipt->receipt_type_id;
            $this->payment_method_id = $Receipt->payment_method_id;
            $this->amount = $Receipt->amount;
            $this->note = $Receipt->note;
        }
    }

    public function render()
    {
        $receiptType = ReceiptType::all();
        $ledger = LedgerAccount::all();
        $contact = Contact::all();
        $payment = PaymentMethod::all();

        return view('pages.backend.accounting.accounting-receipt-details',compact('receiptType', 'ledger','contact','payment'));
    }
}

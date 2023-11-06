<?php

namespace App\Pages\Backend\Setting;


use Livewire\Attributes\Url;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting\PaymentMethod;


#[Layout('layouts.backend')]
class PaymentDetails extends Component
{
    #[Url]
    public $payment_id;
    public $code;
    public $branch;
    public $ledger_account_id;
    public $account_no;
    public $opening_balance;
    public $name;
    public function storeMethod($storeType = null){
        $this->validate([
            'code' => 'required|string',
            'account_no' => 'required|string',
            'branch' => 'required|string',
            'name' => 'required|string',
            'opening_balance' => 'required|string',
        ]);

        $Payment = PaymentMethod::findOrNew($this->payment_id);
        $Payment->user_id = Auth::id();
        $Payment->code = $this->code;
        $Payment->ledger_account_id = $this->ledger_account_id;
        $Payment->account_no = $this->account_no;
        $Payment->opening_balance = $this->opening_balance;
        $Payment->branch = $this->branch;
        $Payment->name = $this->name;
        $Payment->save();
        if($storeType == 'new'){
            $this->reset();
        }
        else{
            $this->payment_id = $Payment->id;
        }

        if($this->payment_id){
            $message = 'Payment Method Updated Successfully!';
        }else{
            $message = 'Payment Method Added Successfully!';
        }

        $this->alert('success',$message);
    }

    public function mount()
    {
        if($this->payment_id) {
            $Payment = PaymentMethod::find($this->payment_id);
            $this->code = $Payment->code;
            $this->name = $Payment->name;
            $this->ledger_account_id = $Payment->ledger_account_id;
            $this->account_no = $Payment->account_no;
            $this->opening_balance = $Payment->opening_balance;
            $this->branch = $Payment->branch;
        }
    }

    public function render()
    {
        return view('pages.backend.setting.payment-details');
    }
}

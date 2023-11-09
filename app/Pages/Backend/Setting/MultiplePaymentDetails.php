<?php

namespace App\Pages\Backend\Setting;


use Livewire\Attributes\Url;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting\PaymentMethod;
use App\Models\Accounting\Transaction;


#[Layout('layouts.backend')]
class MultiplePaymentDetails extends Component
{
    #[Url]
    public $multi_payment_id;
    public $code;
    public $payment_method_id;
    public $charge;
    public $net_amount;
    public $note;
    public $status;
    public function storeMultiplePayment($storeType = null){
        $this->validate([
            'code' => 'required|string',
            'payment_method_id' => 'required|string',
            'net_amount' => 'required|string',
        ]);

        $Payment = Transaction::findOrNew($this->multi_payment_id);
        $Payment->user_id = Auth::id();
        $Payment->code = $this->code;
        $Payment->payment_method_id = $this->payment_method_id;
        $Payment->charge = $this->charge;
        $Payment->status = $this->status;
        $Payment->net_amount = $this->net_amount;
        $Payment->note = $this->note;
        $Payment->save();
        if($storeType == 'new'){
            $this->reset();
        }
        else{
            $this->multi_payment_id = $Payment->id;
        }

        if($this->multi_payment_id){
            $message = 'Transaction Updated Successfully!';
        }else{
            $message = 'Transaction Added Successfully!';
        }

        $this->alert('success',$message);
    }

    public function mount()
    {
        if($this->multi_payment_id) {
            $Payment = Transaction::find($this->multi_payment_id);
            $this->code = $Payment->code;
            $this->payment_method_id = $Payment->payment_method_id;
            $this->charge = $Payment->charge;
            $this->net_amount = $Payment->net_amount;
            $this->note = $Payment->note;
        }
    }
    public function render()
    {
        $payment = PaymentMethod::all();
        return view('pages.backend.setting.multiple-payment-details', compact('payment'));
    }
}

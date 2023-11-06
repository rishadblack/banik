<?php

namespace App\Pages\Backend\Accounting;


use Livewire\Attributes\Url;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Accounting\ReceiptType;

#[Layout('layouts.backend')]
class ReceiptTypeDetails extends Component
{
    #[Url]
    public $receiptType_id;
    public $name;
    public $flow_type;
    public $code;

    public function storeReceiptType($storeType = null)
    {
    $this->validate([
        'code' => 'required|string',
        'name' => 'required|string',
    ]);

    $ReceiptType = ReceiptType::findOrNew($this->receiptType_id);
    $ReceiptType->user_id = Auth::id();
    $ReceiptType->code = $this->code;
    $ReceiptType->flow_type = $this->flow_type;
    $ReceiptType->name = $this->name;
    $ReceiptType->save();

    if($storeType == 'new'){
        $this->reset();
    }else{
        $this->receiptType_id = $ReceiptType-> id;
    }
    if($this->receiptType_id) {
        $message = 'Stock Receipt Type Updated Successfully!';
    } else {
        $message = 'Stock Receipt Type Added Successfully!';
    }

    $this->alert('success', $message);
}

public function mount()
{
    if($this->receiptType_id) {
        $ReceiptType = ReceiptType::find($this->receiptType_id);
        $this->code = $ReceiptType->code;
        $this->flow_type = $ReceiptType->flow_type;
        $this->name = $ReceiptType->name;
    }
}

    public function render()
    {
        return view('pages.backend.accounting.receipt-type-details');
    }
}

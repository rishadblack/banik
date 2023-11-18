<?php

namespace App\Pages\Backend\Accounting;


use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Accounting\ReceiptType;

#[Layout('layouts.backend')]
class ReceiptTypeList extends Component
{

    public $receiptType_id;
    public $name;
    public $flow_type;
    public $code;
    public $status = 1;

    #[On('openReceiptTypeModal')]
    public function openReceiptTypeModal($data = [])
    {
        $this->receiptTypeReset();

        if(isset($data['id'])) {
            $ReceiptType = ReceiptType::find($data['id']);

            if(!$ReceiptType) {
                $this->alert('error', 'Receipt Type Not Found!!');
                return;
            }

            $this->receiptType_id = $ReceiptType->id;
            $this->name = $ReceiptType->name;
            $this->code = $ReceiptType->code;
            $this->flow_type = $ReceiptType->flow_type;
            $this->status = $ReceiptType->status;
        }

        $this->dispatch('modalOpen', 'receiptTypeModal');
    }

    public function receiptTypeReset()
    {
        $this->reset();
        $this->resetValidation();
        $this->code = str_pad((ReceiptType::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
    }


    public function storeReceiptType($storeType = null)
    {
    $this->validate([
        'code' => 'required|string',
        'name' => 'required|string',
    ]);

    $ReceiptType = ReceiptType::findOrNew($this->receiptType_id);
    if($this->receiptType_id) {
        $message = 'Receipt Type Updated Successfully!';
    } else {
        $message = 'Receipt Type Added Successfully!';
        $ReceiptType->user_id = Auth::id();
    }

    $ReceiptType->code = $this->code;
    $ReceiptType->flow_type = $this->flow_type;
    $ReceiptType->name = $this->name;
    $ReceiptType->status = $this->status;
    $ReceiptType->save();

    if($storeType == 'new'){
        $this->receiptTypeReset();
    }else{
        $this->receiptType_id = $ReceiptType-> id;
    }

    $this->alert('success', $message);
    $this->dispatch('refreshDatatable');
}


    #[On('receiptTypeDelete')]
    public function destroy($data)
    {
        $data = $this->alertConfirm($data, 'Are you sure to delete Receipt Type?');

        if(isset($data['id'])) {
            $ReceiptType = ReceiptType::find($data['id']);

            if(!$ReceiptType) {
                $this->alert('error', 'ReceiptType Not Found!!');
                return;
            }

            $ReceiptType->delete();

            $this->alert('success', 'ReceiptType Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.accounting.receipt-type-list');
    }
}

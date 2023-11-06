<?php

namespace App\Pages\Backend\Accounting;


use Livewire\Attributes\On;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use App\Models\Accounting\ReceiptType;

#[Layout('layouts.backend')]
class ReceiptTypeList extends Component
{
    #[On('receiptTypeDelete')]
    public function destroy($data)
    {

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

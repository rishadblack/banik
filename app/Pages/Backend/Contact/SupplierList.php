<?php

namespace App\Pages\Backend\Contact;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use App\Models\Contact\Supplier;


#[Layout('layouts.backend')]
class SupplierList extends Component
{
    public $suppliers;


    #[On('supplierDelete')]
    public function destroy($data)
    {
        // $data = $this->alertConfirm($data, 'Are you sure to delete Supplier?');

        if(isset($data['id'])) {
            $Supplier = Supplier::find($data['id']);

            if(!$Supplier) {
                $this->alert('error', 'Supplier Not Found!!');
                return;
            }

            $Supplier->delete();

            $this->alert('success', 'Supplier Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.contact.supplier-list');
    }
}

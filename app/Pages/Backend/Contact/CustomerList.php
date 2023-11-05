<?php

namespace App\Pages\Backend\Contact;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use App\Models\Contact\Customer;


#[Layout('layouts.backend')]
class CustomerList extends Component
{
    public $customers;


    #[On('customerDelete')]
    public function destroy($data)
    {
        // $data = $this->alertConfirm($data, 'Are you sure to delete Customer?');

        if(isset($data['id'])) {
            $Customer = Customer::find($data['id']);

            if(!$Customer) {
                $this->alert('error', 'Customer Not Found!!');
                return;
            }

            $Customer->delete();

            $this->alert('success', 'Customer Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.contact.customer-list');
    }
}

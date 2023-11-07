<?php

namespace App\Pages\Backend\Contact;


use Livewire\Attributes\On;
use App\Http\Common\Component;
use App\Models\Contact\Contact;
use Livewire\Attributes\Layout;
use App\Models\Contact\Customer;


#[Layout('layouts.backend')]
class CustomerList extends Component
{
    public $customers;


    #[On('customerDelete')]
    public function destroy($data)
    {

        if(isset($data['id'])) {
            $Customer = Contact::find($data['id']);

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

<?php

namespace App\Pages\Backend\Contact;

use Livewire\Attributes\On;
use App\Http\Common\Component;
use App\Models\Contact\Contact;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]

class BillerList extends Component
{
    #[On('billerDelete')]
    public function destroy($data)
    {

        if(isset($data['id'])) {
            $Biller = Contact::find($data['id']);

            if(!$Biller) {
                $this->alert('error', 'Biller Not Found!!');
                return;
            }

            $Biller->delete();

            $this->alert('success', 'Biller Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.contact.biller-list');
    }
}

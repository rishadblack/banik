<?php

namespace App\Pages\Backend\Contact;


use Livewire\Attributes\On;
use App\Http\Common\Component;
use App\Models\Contact\Contact;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class StuffList extends Component
{
    #[On('stuffDelete')]
    public function destroy($data)
    {
        $data = $this->alertConfirm($data, 'Are you sure to delete Stuff?');

        if(isset($data['id'])) {
            $Stuff = Contact::find($data['id']);

            if(!$Stuff) {
                $this->alert('error', 'Stuff Not Found!!');
                return;
            }

            $Stuff->delete();

            $this->alert('success', 'Stuff Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }
    }
    public function render()
    {
        return view('pages.backend.contact.stuff-list');
    }
}

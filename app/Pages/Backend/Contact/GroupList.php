<?php

namespace App\Pages\Backend\Contact;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use App\Models\Contact\ContactGroup;


#[Layout('layouts.backend')]
class GroupList extends Component
{
    public $groups;


    #[On('groupDelete')]
    public function destroy($data)
    {

        if(isset($data['id'])) {
            $Group = ContactGroup::find($data['id']);

            if(!$Group) {
                $this->alert('error', 'Group Not Found!!');
                return;
            }

            $Group->delete();

            $this->alert('success', 'Group Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.contact.group-list');
    }
}

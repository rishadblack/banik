<?php

namespace App\Pages\Backend\Contact;


use Livewire\Attributes\On;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use App\Models\Contact\ContactGroup;
use Illuminate\Support\Facades\Auth;


#[Layout('layouts.backend')]
class GroupList extends Component
{
    public $group_id;
    public $name;
    public $code;
    public $status = 1;
    public $Groups;

    #[On('openGroupModal')]
    public function openGroupModal($data = [])
    {
        $this->groupReset();

        if(isset($data['id'])) {
            $Group = ContactGroup::find($data['id']);

            if(!$Group) {
                $this->alert('error', 'Group Not Found!!');
                return;
            }

            $this->group_id = $Group->id;
            $this->name = $Group->name;
            $this->status = $Group->status??0;
        }

        $this->dispatch('modalOpen', 'groupModal');
    }

    public function groupReset()
    {
        $this->reset();
        $this->resetValidation();
        // $this->code = str_pad((ContactGroup::latest()->orderByDesc('id')->first()->code + 1), 3, '0', STR_PAD_LEFT);
    }

    #[On('groupDelete')]
    public function destroy($data)
    {
         $data = $this->alertConfirm($data, 'Are you sure to delete Group?');

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

    public function storeGroup($storeType = null)
    {
        $this->validate([
            'name' => 'required|string',
            'status' => 'required',
        ]);

        $Group = ContactGroup::findOrNew($this->group_id);

        if($this->group_id) {
            $message = 'Group Updated Successfully!';
        } else {
            $message = 'Group Added Successfully!';
            $Group->user_id = Auth::id();
        }

        $Group->name = $this->name;
        $Group->status = $this->status??0;
        $Group->save();

        if($storeType == 'new') {
            $this->groupReset();
        } else {
            $this->group_id = $Group->id;
        }
        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');

    }


    public function render()
    {
        return view('pages.backend.contact.group-list');
    }
}

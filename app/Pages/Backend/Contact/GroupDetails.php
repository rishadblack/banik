<?php

namespace App\Pages\Backend\Contact;

use Livewire\Attributes\Url;
use App\Models\Contact\Group;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use App\Models\Contact\ContactGroup;
use Illuminate\Support\Facades\Auth;


#[Layout('layouts.backend')]
class GroupDetails extends Component
{
    #[Url]
    public $if_default;
    public $name;
    public $group_id;
    public $status = 1;
    public function storeGroup($storeType = null)
    {

        $this->validate([
            'name' => 'required|string',
            'status' => 'required|string',
        ]);

        $Group = ContactGroup::findOrNew($this->group_id);
        $Group->user_id = Auth::id();
        $Group->name = $this->name;
        $Group->status = $this->status;
        //$Group->if_default = $this->if_default;
        $Group->save();

        if($storeType == 'new'){
            $this->reset();
        }else{
            $this->group_id = $Group-> id;
        }
        if($this->group_id) {
            $message = 'Group Updated Successfully!';
        } else {
            $message = 'Group Added Successfully!';
        }

        $this->alert('success', $message);
    }

    public function mount()
    {

        if($this->group_id) {
            $Group = ContactGroup::find($this->group_id);
            $this->name = $Group->name;
            $this->status = $Group->status;
           // $this->if_default = $Group->if_default;
        }
    }

    public function render()
    {
        return view('pages.backend.contact.group-details');
    }
}

<?php

namespace App\Pages\Backend\Contact;

use App\Http\Common\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]

class BillerList extends Component
{
    public function render()
    {
        return view('pages.backend.contact.biller-list');
    }
}

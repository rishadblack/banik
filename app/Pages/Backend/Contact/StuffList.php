<?php

namespace App\Pages\Backend\Contact;


use App\Http\Common\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class StuffList extends Component
{
    public function render()
    {
        return view('pages.backend.contact.stuff-list');
    }
}

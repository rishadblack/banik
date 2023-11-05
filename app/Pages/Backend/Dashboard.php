<?php

namespace App\Pages\Backend;

use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class Dashboard extends Component
{
    public function render()
    {
        return view('pages.backend.dashboard');
    }
}

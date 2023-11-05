<?php

namespace App\Pages\Backend\Setting;

use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class OutletDetails extends Component
{
    public $outlet_id;
    public function render()
    {
        return view('pages.backend.setting.outlet-details');
    }
}

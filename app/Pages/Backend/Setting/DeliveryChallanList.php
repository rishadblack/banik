<?php

namespace App\Pages\Backend\Setting;

use App\Http\Common\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class DeliveryChallanList extends Component
{
    public function render()
    {
        return view('pages.backend.setting.delivery-challan-list');
    }
}

<?php

namespace App\Pages\Backend\Setting;

use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class DeliveryChallanDetails extends Component
{
    public $challan_id;
    public function render()
    {
        return view('pages.backend.setting.delivery-challan-details');
    }
}

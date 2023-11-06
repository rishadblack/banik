<?php

namespace App\Pages\Backend\Order;


use App\Http\Common\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class DeliveryChallanDetails extends Component
{
    public $challan_id;
    public function render()
    {
        return view('pages.backend.order.delivery-challan-details');
    }
}

<?php

namespace App\Pages\Backend\Order;

use App\Http\Common\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class QuotationList extends Component
{
    public function render()
    {
        return view('pages.backend.order.quotation-list');
    }
}

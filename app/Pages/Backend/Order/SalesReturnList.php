<?php

namespace App\Pages\Backend\Order;

use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class SalesReturnList extends Component
{
    public function render()
    {
        return view('pages.backend.order.sales-return-list');
    }
}

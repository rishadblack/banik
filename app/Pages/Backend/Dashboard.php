<?php

namespace App\Pages\Backend;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Setting\Warehouse;
use App\Models\Setting\PaymentMethod;


#[Layout('layouts.backend')]
class Dashboard extends Component
{
    public function render()
    {
        $warehouse = Warehouse::all();
        $paymentmethod = PaymentMethod::all();
        return view('pages.backend.dashboard',compact('warehouse','paymentmethod'));
    }
}

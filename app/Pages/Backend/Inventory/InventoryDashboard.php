<?php

namespace App\Pages\Backend\Inventory;

use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class InventoryDashboard extends Component
{
    public $dashboard_id;
    public function render()
    {
        return view('pages.backend.inventory.inventory-dashboard');
    }
}

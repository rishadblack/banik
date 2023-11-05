<?php

namespace App\Pages\Backend\Setting;


use App\Http\Common\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class WarehouseDetails extends Component
{
    public $warehouse_id;
    public function render()
    {
        return view('pages.backend.setting.warehouse-details');
    }
}

<?php

namespace App\Pages\Backend\Setting;

use App\Http\Common\Component;

use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]

class WarehouseList extends Component
{
    public function render()
    {
        return view('pages.backend.setting.warehouse-list');
    }
}

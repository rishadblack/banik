<?php

namespace App\Pages\Backend\Setting;

use Livewire\Attributes\On;

use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use App\Models\Setting\Warehouse;


#[Layout('layouts.backend')]

class WarehouseList extends Component
{
    #[On('warehouseDelete')]
    public function destroy($data)
    {
        // $data = $this->alertConfirm($data, 'Are you sure to delete Warehouse?');

        if(isset($data['id'])) {
            $Warehouse = Warehouse::find($data['id']);

            if(!$Warehouse) {
                $this->alert('error', 'Warehouse Not Found!!');
                return;
            }

            $Warehouse->delete();

            $this->alert('success', 'Warehouse Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.setting.warehouse-list');
    }
}

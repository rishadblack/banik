<?php

namespace App\Pages\Backend\Setting;

use Livewire\Attributes\On;
use App\Http\Common\Component;
use App\Models\Setting\Outlet;
use Livewire\Attributes\Layout;

#[Layout('layouts.backend')]
class OutletList extends Component
{
    #[On('outletDelete')]
    public function destroy($data)
    {
        // $data = $this->alertConfirm($data, 'Are you sure to delete Outlet?');

        if(isset($data['id'])) {
            $Outlet = Outlet::find($data['id']);

            if(!$Outlet) {
                $this->alert('error', 'Outlet Not Found!!');
                return;
            }

            $Outlet->delete();

            $this->alert('success', 'Outlet Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        return view('pages.backend.setting.outlet-list');
    }
}

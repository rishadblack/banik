<?php

namespace App\Pages\Backend\Product;

use Livewire\Attributes\On;
use App\Models\Product\Unit;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.backend')]
class UnitList extends Component
{
    public $units;


    #[On('unitDelete')]
    public function destroy($data)
    {
        // $data = $this->alertConfirm($data, 'Are you sure to delete unit?');

        if(isset($data['id'])) {
            $Unit = Unit::find($data['id']);

            if(!$Unit) {
                $this->alert('error', 'Unit Not Found!!');
                return;
            }

            $Unit->delete();

            $this->alert('success', 'Unit Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }

    public function render()
    {
        $this->units = Unit::all();
        return view('pages.backend.product.unit-list');
    }
}

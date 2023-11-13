<?php

namespace App\Pages\Backend\Product;

use Livewire\Attributes\On;
use App\Models\Product\Unit;
use Livewire\Attributes\Url;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.backend')]
class UnitList extends Component
{

    public $unit_id;
    public $name;
    public $code;
    public $status;
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

    public function storeUnit($storeType = null)
    {
        $this->validate([
            'name' => 'required|string',
            'code' => 'required|string',
        ]);

        $Unit = Unit::findOrNew($this->unit_id);
        $Unit->name = $this->name;
        $Unit->code = $this->code;
        $Unit->status = $this->status;
        $Unit->save();

        if($storeType == 'new') {
            $this->reset();
        } else {
            $this->unit_id = $Unit->id;
        }

        if($this->unit_id) {
            $message = 'Unit Updated Successfully!';
        } else {
            $message = 'Unit Added Successfully!';
        }

        $this->alert('success', $message);

    }

    public function mount()
    {
        if($this->unit_id) {
            $Unit = Unit::find($this->unit_id);
            $this->name = $Unit->name;
            $this->code = $Unit->code;
        }
    }


    public function render()
    {
        $this->units = Unit::all();
        return view('pages.backend.product.unit-list');
    }
}

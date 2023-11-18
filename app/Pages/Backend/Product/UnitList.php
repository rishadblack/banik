<?php

namespace App\Pages\Backend\Product;

use Livewire\Attributes\On;
use App\Models\Product\Unit;
use Livewire\Attributes\Url;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.backend')]
class UnitList extends Component
{

    public $unit_id;
    public $name;
    public $code;
    public $status = 1;
    public $units;

    #[On('openUnitModal')]
    public function openUnitModal($data = [])
    {
        $this->unitReset();

        if(isset($data['id'])) {
            $Unit = Unit::find($data['id']);

            if(!$Unit) {
                $this->alert('error', 'Unit Not Found!!');
                return;
            }

            $this->unit_id = $Unit->id;
            $this->name = $Unit->name;
            $this->code = $Unit->code;
            $this->status = $Unit->status;
        }

        $this->dispatch('modalOpen', 'unitModal');
    }

    public function unitReset()
    {
        $this->reset();
        $this->resetValidation();
        $this->code = str_pad((Unit::latest()->orderByDesc('id')->first()->code + 1), 3, '0', STR_PAD_LEFT);
    }

    #[On('unitDelete')]
    public function destroy($data)
    {
         $data = $this->alertConfirm($data, 'Are you sure to delete unit?');

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
        $data =$this->validate([
            'name' => 'required|string',
            'code' => 'required|string',
        ]);

        $Unit = Unit::findOrNew($this->unit_id);

        if($this->unit_id) {
            $message = 'Unit Updated Successfully!';
        } else {
            $message = 'Unit Added Successfully!';
            $Unit->user_id = Auth::id();
        }

        $Unit->name = $this->name;
        $Unit->code = $this->code;
        $Unit->status = $this->status;
        $Unit->save();

        if($storeType == 'new') {
            $this->unitreset();
        } else {
            $this->unit_id = $Unit->id;
        }
        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');

    }


    public function render()
    {
        $this->units = Unit::all();
        return view('pages.backend.product.unit-list');
    }
}

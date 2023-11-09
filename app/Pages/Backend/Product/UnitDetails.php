<?php

namespace App\Pages\Backend\Product;

use App\Models\Product\Unit;
use Livewire\Attributes\Url;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.backend')]
class UnitDetails extends Component
{
    #[Url]
    public $unit_id;

    public $name;
    public $code;
    public $status;

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
        return view('pages.backend.product.unit-details');
    }
}

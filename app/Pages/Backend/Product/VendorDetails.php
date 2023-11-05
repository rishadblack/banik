<?php

namespace App\Pages\Backend\Product;

use Livewire\Attributes\Url;
use App\Models\Product\Brand;
use Livewire\WithFileUploads;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;


#[Layout('layouts.backend')]
class VendorDetails extends Component
{
    use WithFileUploads;
    #[Url]
    public $vendor_id;

    public $name;
    public $code;


    public function storeVendor($storeType = null)
    {

        $this->validate([
            'name' => 'required|string',
            'code' => 'required|string',
        ]);


        $Vendor = Brand::findOrNew($this->vendor_id);
        $Vendor->name = $this->name;
        $Vendor->code = $this->code;
        $Vendor->save();


        if ($storeType == 'new') {
            $this->reset();
        } else {
            $this->vendor_id = $Vendor->id;
        }

        if ($this->vendor_id) {
            $message = 'Brand Updated Successfully!';
        } else {
            $message = 'Brand Added Successfully!';
        }

        $this->alert('success', $message);
    }

    public function mount()
    {
        if ($this->vendor_id) {
            $Vendor = Brand::find($this->vendor_id);
            $this->name = $Vendor->name;
            $this->code = $Vendor->code;
        }
    }

    public function render()
    {
        return view('pages.backend.product.vendor-details');
    }
}

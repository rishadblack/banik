<?php

namespace App\Pages\Backend\Product;

use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use App\Models\Product\Brand;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class VendorList extends Component

{
    #[Url]
    public $vendor_id;

    public $name;
    public $code;
    public $status;
    public $vendors;

    #[On('brandDelete')]
    public function destroy($data)
    {
        // $data = $this->alertConfirm($data, 'Are you sure to delete Vendor?');

        if(isset($data['id'])) {
            $Vendor = Brand::find($data['id']);

            if(!$Vendor) {
                $this->alert('error', 'Vendor Not Found!!');
                return;
            }

            $Vendor->delete();

            $this->alert('success', 'Vendor Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function storeVendor($storeType = null)
    {

        $this->validate([
            'name' => 'required|string',
            'code' => 'required|string',
        ]);


        $Vendor = Brand::findOrNew($this->vendor_id);
        $Vendor->name = $this->name;
        $Vendor->code = $this->code;
        $Vendor->status = $this->status;
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
        $this->vendors = Brand::all();
        return view('pages.backend.product.vendor-list');
    }
}

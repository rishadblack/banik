<?php

namespace App\Pages\Backend\Product;

use Livewire\Attributes\On;
use App\Models\Product\Brand;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class VendorList extends Component

{
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

    public function render()
    {
        $this->vendors = Brand::all();
        return view('pages.backend.product.vendor-list');
    }
}

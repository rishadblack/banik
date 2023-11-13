<?php

namespace App\Pages\Backend\Product;

use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use App\Models\Product\Brand;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;


#[Layout('layouts.backend')]
class VendorList extends Component

{

    public $vendor_id;

    public $name;
    public $code;
    public $status = 1;
    public $vendors;

    #[On('openBrandModal')]
    public function openBrandModal($data = [])
    {
        $this->brandReset();

        if(isset($data['id'])) {
            $Vendor = Brand::find($data['id']);

            if(!$Vendor) {
                $this->alert('error', 'Brand Not Found!!');
                return;
            }

            $this->vendor_id = $Vendor->id;
            $this->name = $Vendor->name;
            $this->code = $Vendor->code;
            $this->status = $Vendor->status;
        }

        $this->dispatch('modalOpen', 'brandModal');
    }

    public function brandReset()
    {
        $this->reset();
        $this->resetValidation();
        $this->code = str_pad((Brand::latest()->orderByDesc('id')->first()->code + 1), 3, '0', STR_PAD_LEFT);
    }

    #[On('brandDelete')]
    public function destroy($data)
    {
        $data = $this->alertConfirm($data, 'Are you sure to delete Brand?');

        if(isset($data['id'])) {
            $Vendor = Brand::find($data['id']);

            if(!$Vendor) {
                $this->alert('error', 'Brand Not Found!!');
                return;
            }

            $Vendor->delete();

            $this->alert('success', 'Brand Deleted Successfully!!');
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

        if ($this->vendor_id) {
            $message = 'Brand Updated Successfully!';
        } else {
            $message = 'Brand Added Successfully!';
            $Vendor->user_id = Auth::id();
        }
        $Vendor->name = $this->name;
        $Vendor->code = $this->code;
        $Vendor->status = $this->status;
        $Vendor->save();


        if ($storeType == 'new') {
            $this->brandReset();
        } else {
            $this->vendor_id = $Vendor->id;
        }
        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');
    }


    public function render()
    {
        $this->vendors = Brand::all();
        return view('pages.backend.product.vendor-list');
    }
}

<?php

namespace App\Pages\Backend\Setting;


use App\Models\Country;
use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use Livewire\Attributes\Url;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use App\Models\Setting\Warehouse;
use Illuminate\Support\Facades\Auth;


#[Layout('layouts.backend')]
class WarehouseDetails extends Component
{
    #[Url]
    public $warehouse_id;
    public $country_id;
    public $division_id;
    public $code;
    public $name;
    public $address;
    public $upazila_id;
    public $district_id;
    public $status;

    public function storeWarehouse($storeType = null)
    {
        $this->validate([
            'code' => 'required|string',
            'address' => 'required|string',
        ]);

        $Warehouse = Warehouse::findOrNew($this->warehouse_id);
        $Warehouse->user_id = Auth::id();
        $Warehouse->code = $this->code;
        $Warehouse->name = $this->name;
        $Warehouse->address = $this->address;
        $Warehouse->status = $this->status;
        $Warehouse->country_id = $this->country_id;
        $Warehouse->division_id = $this->division_id;
        $Warehouse->district_id = $this->district_id;
        $Warehouse->upazila_id = $this->upazila_id;
        $Warehouse->save();

        if ($storeType == 'new') {
            $this->reset();
        } else {
            $this->warehouse_id = $Warehouse->id;
        }
        if ($this->warehouse_id) {
            $message = 'Warehouse Updated Successfully!';
        } else {
            $message = 'Warehouse Added Successfully!';
        }

        $this->alert('success', $message);
    }

    public function mount()
    {
        if($this->warehouse_id) {
            $Warehouse = Warehouse::find($this->warehouse_id);
            $this->code = $Warehouse->code;
            $this->name = $Warehouse->name;
            $this->address = $Warehouse->address;
            $this->district_id = $Warehouse->district_id;
            $this->country_id = $Warehouse->country_id;
            $this->division_id = $Warehouse->division_id;
            $this->upazila_id = $Warehouse->upazila_id;
        }
    }
    public function render()
    {
        $country = Country::all();
        $division = Division::where('country_id', 19)->get();
        $district = District::where('division_id', 5)->get();
        $thana = Upazila::where('district_id', 1)->get();
        return view('pages.backend.setting.warehouse-details', compact('country', 'division', 'district', 'thana'));
    }
}

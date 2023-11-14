<?php

namespace App\Pages\Backend\Setting;

use App\Models\Country;
use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use Livewire\Attributes\Url;
use App\Http\Common\Component;
use App\Models\Setting\Outlet;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;


#[Layout('layouts.backend')]
class OutletDetails extends Component
{
    #[Url]
    public $outlet_id;
    public $country_id;
    public $division_id;
    public $code;
    public $name;
    public $address;
    public $upazila_id;
    public $district_id;
    public $status = 1;
    public function storeOutlet($storeType = null)
    {
        $this->validate([
            'code' => 'required|string',
            'address' => 'required|string',
        ]);

        $Outlet = Outlet::findOrNew($this->outlet_id);
        $Outlet->user_id = Auth::id();
        $Outlet->code = $this->code;
        $Outlet->name = $this->name;
        $Outlet->address = $this->address;
        $Outlet->status = $this->status;
        $Outlet->country_id = $this->country_id;
        $Outlet->division_id = $this->division_id;
        $Outlet->district_id = $this->district_id;
        $Outlet->upazila_id = $this->upazila_id;
        $Outlet->save();

        if ($storeType == 'new') {
            $this->outletReset();
        } else {
            $this->outlet_id = $Outlet->id;
        }
        if ($this->outlet_id) {
            $message = 'Outlet Updated Successfully!';
        } else {
            $message = 'Outlet Added Successfully!';
        }

        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');


    }

    public function outletReset()
    {
        $this->reset();
        $this->resetValidation();
        $this->code = str_pad((Outlet::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
    }

    public function mount()
    {
        if($this->outlet_id) {
            $Outlet = Outlet::find($this->outlet_id);
            $this->code = $Outlet->code;
            $this->name = $Outlet->name;
            $this->address = $Outlet->address;
            $this->district_id = $Outlet->district_id;
            $this->country_id = $Outlet->country_id;
            $this->division_id = $Outlet->division_id;
            $this->upazila_id = $Outlet->upazila_id;
        }else{
            $this->outletReset();
        }
    }
    public function render()
    {
        $country = Country::all();
        $division = Division::where('country_id', 19)->get();
        $district = District::where('division_id', 5)->get();
        $thana = Upazila::where('district_id', 1)->get();
        return view('pages.backend.setting.outlet-details', compact('country', 'division', 'district', 'thana'));
    }
}

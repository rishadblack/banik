<?php

namespace App\Pages\Backend\Setting;

use App\Models\Country;
use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use Livewire\Attributes\On;
use App\Http\Common\Component;
use App\Models\Setting\Outlet;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
#[Layout('layouts.backend')]
class OutletList extends Component
{

    public $outlet_id;
    public $country_id;
    public $division_id;
    public $code;
    public $name;
    public $address;
    public $upazila_id;
    public $district_id;
    public $status = 1;

    #[On('openOutletModal')]
    public function openOutletModal($data = [])
    {
        $this->outletReset();

        if(isset($data['id'])) {
            $Outlet = Outlet::find($data['id']);

            if(!$Outlet) {
                $this->alert('error', 'Outlet Not Found!!');
                return;
            }

            $this->code = $Outlet->code;
            $this->name = $Outlet->name;
            $this->address = $Outlet->address;
            $this->status = $Outlet->status;
            $this->district_id = $Outlet->district_id;
            $this->country_id = $Outlet->country_id;
            $this->division_id = $Outlet->division_id;
            $this->upazila_id = $Outlet->upazila_id;
        }

        $this->dispatch('modalOpen', 'outletModal');
    }


    public function storeOutlet($storeType = null)
    {
        $this->validate([
            'code' => 'required|string',
            'address' => 'required|string',
        ]);
        if ($this->outlet_id) {
            $message = 'Outlet Updated Successfully!';
        } else {
            $message = 'Outlet Added Successfully!';
        }


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

        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');


    }

    public function outletReset()
    {
        $this->reset();
        $this->resetValidation();
        $this->code = str_pad((Outlet::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
    }


    #[On('outletDelete')]
    public function destroy($data)
    {
        $data = $this->alertConfirm($data, 'Are you sure to delete Outlet?');

        if(isset($data['id'])) {
            $Outlet = Outlet::find($data['id']);

            if(!$Outlet) {
                $this->alert('error', 'Outlet Not Found!!');
                return;
            }

            $Outlet->delete();

            $this->alert('success', 'Outlet Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        $country = Country::all();
        $division = Division::where('country_id', 19)->get();
        $district = District::where('division_id', 5)->get();
        $thana = Upazila::where('district_id', 1)->get();
        return view('pages.backend.setting.outlet-list', compact('country', 'division', 'district', 'thana'));
    }
}

<?php

namespace App\Pages\Backend\Setting;

use App\Models\Country;
use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use Livewire\Attributes\On;
use App\Http\Common\Component;
use App\Models\Setting\Warehouse;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.backend')]
class WarehouseList extends Component
{

    public $warehouse_id;
    public $country_id;
    public $division_id;
    public $code;
    public $name;
    public $address;
    public $upazila_id;
    public $district_id;
    public $status = 1;

    #[On('openWarehouseModal')]
    public function openWarehouseModal($data = [])
    {
        $this->warehouseReset();

        if(isset($data['id'])) {
            $Warehouse = Warehouse::find($data['id']);

            if(!$Warehouse) {
                $this->alert('error', 'Warehouse Not Found!!');
                return;
            }

            $this->code = $Warehouse->code;
            $this->name = $Warehouse->name;
            $this->address = $Warehouse->address;
            $this->status = $Warehouse->status;
            $this->district_id = $Warehouse->district_id;
            $this->country_id = $Warehouse->country_id;
            $this->division_id = $Warehouse->division_id;
            $this->upazila_id = $Warehouse->upazila_id;
        }

        $this->dispatch('modalOpen', 'warehouseModal');
    }


    public function storeWarehouse($storeType = null)
    {
        $this->validate([
            'code' => 'required|string',
            'address' => 'required|string',
        ]);
        if ($this->warehouse_id) {
            $message = 'Warehouse Updated Successfully!';
        } else {
            $message = 'Warehouse Added Successfully!';
        }


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
            $this->warehouseReset();
        } else {
            $this->warehouse_id = $Warehouse->id;
        }

        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');


    }

    public function warehouseReset()
    {
        $this->reset();
        $this->resetValidation();
        $this->code = str_pad((Warehouse::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
    }


    #[On('warehouseDelete')]
    public function destroy($data)
    {
        $data = $this->alertConfirm($data, 'Are you sure to delete Warehouse?');

        if(isset($data['id'])) {
            $Warehouse = Warehouse::find($data['id']);

            if(!$Warehouse) {
                $this->alert('error', 'Warehouse Not Found!!');
                return;
            }

            $Warehouse->delete();

            $this->alert('success', 'Warehouse Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }
    public function render()
    {
        $country = Country::all();
        $division = Division::where('country_id', 19)->get();
        $district = District::where('division_id', 5)->get();
        $thana = Upazila::where('district_id', 1)->get();
        return view('pages.backend.setting.warehouse-list', compact('country', 'division', 'district', 'thana'));
    }
}

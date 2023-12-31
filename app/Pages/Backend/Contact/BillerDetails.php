<?php

namespace App\Pages\Backend\Contact;

use App\Models\Country;
use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use Livewire\Attributes\Url;
use App\Http\Common\Component;
use App\Models\Contact\Contact;
use Livewire\Attributes\Layout;
use App\Models\Contact\ContactInfo;
use App\Models\Contact\ContactGroup;
use Illuminate\Support\Facades\Auth;


#[Layout('layouts.backend')]
class BillerDetails extends Component
{
    #[Url]
    public $biller_id;
    public $division;
    public $address;
    public $contact_group_id;
    public $name;
    public $code;
    public $company_name;
    public $mobile;
    public $country_id;
    public $postcode;
    public $state_id;
    public $group_id;
    public $credit_limit;
    public $opening_balance;
    public $status = 1;

    public function storeBiller($storeType = null)
    {

        $this->validate([
            'code' => 'required|string',


        ]);

        $Biller = Contact::findOrNew($this->biller_id);
        if($this->biller_id) {
            $message = 'Biller Updated Successfully!';
        } else {
            $message = 'Biller Added Successfully!';
            $Biller->user_id = Auth::id();
        }

        $Biller->code = $this->code;
        $Biller->mobile = $this->mobile;
        $Biller->type = 3;
        $Biller->contact_group_id = $this->contact_group_id;
        $Biller->country_id = $this->country_id;
        $Biller->state_id = $this->state_id;
        $Biller->postcode = $this->postcode;
        $Biller->address = $this->address;
        $Biller->status = $this->status;
        $Biller->save();

        $BillerInfo = $Biller->ContactInfo()->firstOrNew();
        $BillerInfo->user_id = $Biller->user_id;
        $BillerInfo->contact_id = $Biller->id;
        $BillerInfo->name = $this->name;
        $BillerInfo->mobile = $this->mobile;
        $BillerInfo->save();


        if($storeType == 'new'){
            $this->billerReset();
        }else{
            $this->biller_id = $Biller-> id;
        }


        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');
    }
    public function billerReset()
    {
        $this->reset();
        $this->resetValidation();
        $this->code = str_pad((Contact::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
    }

    public function mount()
    {
        if($this->biller_id) {
            $Biller = Contact::find($this->biller_id);
            $this->code = $Biller->code;
            $this->mobile = $Biller->mobile;
            $this->contact_group_id = $Biller->contact_group_id;
            $this->company_name = $Biller->company_name;
            $this->country_id = $Biller->country_id;
            $this->postcode = $Biller->postcode;
            $this->state_id = $Biller->state_id;
            $this->address = $Biller->address;

            $Biller = ContactInfo::find($this->biller_id);
            $this->name = $Biller->first_name;
            $this->mobile = $Biller->mobile;

        }else{
            $this->billerReset();
        }
    }

    public function render()
    {
        $group= ContactGroup::all();
        $country = Country::all();
        $division = Division::where('country_id', 19)->get();
        $district = District::where('division_id', 5)->get();
        $thana = Upazila::where('district_id', 1)->get();
        return view('pages.backend.contact.biller-details',compact('country','group','district','thana','division'));
    }
}

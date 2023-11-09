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
class StuffDetails extends Component
{
    #[Url]
    public $stuff_id;
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
    public $status;

    public function storeStuff($storeType = null)
    {

        $this->validate([
            'code' => 'required|string',


        ]);

        $Stuff = Contact::findOrNew($this->stuff_id);

        $Stuff->user_id = Auth::id();
        $Stuff->code = $this->code;
        $Stuff->mobile = $this->mobile;
        $Stuff->type = 4;
        $Stuff->contact_group_id = $this->contact_group_id;
        $Stuff->country_id = $this->country_id;
        $Stuff->state_id = $this->state_id;
        $Stuff->postcode = $this->postcode;
        $Stuff->address = $this->address;
        $Stuff->status = $this->status;
        $Stuff->save();

        $StuffInfo = new ContactInfo();
        $StuffInfo->user_id = Auth::id();
        $StuffInfo->contact_id = $Stuff->id;
        $StuffInfo->name = $this->name;
        $StuffInfo->mobile = $this->mobile;
        $StuffInfo->save();


        if($storeType == 'new'){
            $this->reset();
        }else{
            $this->stuff_id = $Stuff-> id;
        }
        if($this->stuff_id) {
            $message = 'Stuff Updated Successfully!';
        } else {
            $message = 'Stuff Added Successfully!';
        }

        $this->alert('success', $message);
    }

    public function mount()
    {
        if($this->stuff_id) {
            $Stuff = Contact::find($this->stuff_id);
            $this->code = $Stuff->code;
            $this->mobile = $Stuff->mobile;
            $this->contact_group_id = $Stuff->contact_group_id;
            $this->company_name = $Stuff->company_name;
            $this->country_id = $Stuff->country_id;
            $this->postcode = $Stuff->postcode;
            $this->state_id = $Stuff->state_id;
            $this->address = $Stuff->address;

            $Stuff = ContactInfo::find($this->stuff_id);
            $this->name = $Stuff->first_name;
            $this->mobile = $Stuff->mobile;

        }
    }

    public function render()
    {
        $group= ContactGroup::all();
        $country = Country::all();
        $division = Division::where('country_id', 19)->get();
        $district = District::where('division_id', 5)->get();
        $thana = Upazila::where('district_id', 1)->get();
        return view('pages.backend.contact.stuff-details',compact('country','group','district','thana','division'));
    }
}

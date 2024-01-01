<?php

namespace App\Pages\Backend\Contact;


use App\Models\Country;
use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Livewire\Attributes\Url;
use Livewire\WithFileUploads;
use App\Http\Common\Component;
use App\Models\Contact\Contact;
use Livewire\Attributes\Layout;
use App\Models\Contact\Customer;
use App\Models\Contact\ContactInfo;
use App\Models\Contact\ContactGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


#[Layout('layouts.backend')]
class CustomerDetails extends Component
{
    use WithFileUploads;
    #[Url]
    public $customer_id;
    public $image_url_preview;
    public $image_url;
    public $name;
    public $code;
    public $company_name;
    public $mobile;
    public $email;
    public $country_id;
    public $postcode;
    public $state_id;
    public $contact_group_id;
    public $division;
    public $address;
    public $credit_limit;
    public $opening_balance;
    public $status = 1;

    public function storeCustomer($storeType = null)
    {

        $this->validate([
            'code' => 'required|string',


        ]);


        $Customer = Contact::findOrNew($this->customer_id);
        if($this->customer_id) {
            $message = 'Customer Updated Successfully!';
        } else {
            $message = 'Customer Added Successfully!';
            $Customer->user_id = Auth::id();
        }

        $Customer->code = $this->code;
        $Customer->mobile = $this->mobile;
        $Customer->type = 1;
        $Customer->contact_group_id = $this->contact_group_id;
        $Customer->company_name = $this->company_name;
        $Customer->country_id = $this->country_id;
        $Customer->state_id = $this->state_id;
        $Customer->postcode = $this->postcode;
        $Customer->email = $this->email;
        $Customer->address = $this->address;
        $Customer->opening_balance = $this->opening_balance;
        $Customer->credit_limit = $this->credit_limit;
        $Customer->status = $this->status;
        $Customer->save();

        $CustomerInfo = $Customer->ContactInfo()->firstOrNew();
        $CustomerInfo->user_id = $Customer->user_id;
        $CustomerInfo->contact_id = $Customer->id;
        $CustomerInfo->name = $this->name;
        $CustomerInfo->mobile = $this->mobile;
        $CustomerInfo->email = $this->email;
        $CustomerInfo->status = $this->status;
        $CustomerInfo->save();



        if($storeType == 'new'){
            $this->customerReset();
        }else{
            $this->customer_id = $Customer-> id;
        }

        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');
    }
    public function customerReset()
    {
        $this->reset();
        $this->resetValidation();
        $this->code = str_pad((Contact::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
    }



    public function mount()
    {
        if($this->customer_id) {
            $Customer = Contact::find($this->customer_id);
            $this->code = $Customer->code;
            $this->mobile = $Customer->mobile;
            $this->contact_group_id = $Customer->contact_group_id;
            $this->company_name = $Customer->company_name;
            $this->country_id = $Customer->country_id;
            $this->postcode = $Customer->postcode;
            $this->state_id = $Customer->state_id;
            $this->address = $Customer->address;
            $this->opening_balance = numberFormat($Customer->opening_balance);
            $this->credit_limit =numberFormat($Customer->credit_limit);
            $this->email = $Customer->email;
            $this->status = $Customer->status;


            $this->name = $Customer->ContactInfo->name;
            $this->mobile =$Customer->ContactInfo->mobile;
            $this->email =$Customer->ContactInfo->email;

        }else{
            $this->customerReset();
        }

    }
    public function render()
    {
        $group= ContactGroup::all();
        $country = Country::all();
        $division = Division::where('country_id', 19)->get();
        $district = District::where('division_id', 5)->get();
        $thana = Upazila::where('district_id', 1)->get();
        return view('pages.backend.contact.customer-details', compact('group','country','division','district','thana'));
    }
}

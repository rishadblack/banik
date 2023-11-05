<?php

namespace App\Pages\Backend\Contact;


use App\Models\Country;
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
    public $image_url_preview;
    public $image_url;
    public $name;
    public $code;
    public $company_name;
    public $mobile;
    public $customer_id;
    public $country_id;
    public $postcode;
    public $state_id;
    public $contact_group_id;
    public $division;
    public $address;
    public $credit_limit;
    public $opening_balance;

    public function storeCustomer($storeType = null)
    {

        $this->validate([
            'code' => 'required|string',


        ]);

        $Customer = Contact::findOrNew($this->customer_id);

        $Customer->user_id = Auth::id();
        $Customer->code = $this->code;
        $Customer->mobile = $this->mobile;
        $Customer->type = 1;
        $Customer->contact_group_id = $this->contact_group_id;
        $Customer->company_name = $this->company_name;
        $Customer->country_id = $this->country_id;
        $Customer->state_id = $this->state_id;
        $Customer->postcode = $this->postcode;
        $Customer->address = $this->address;
        $Customer->opening_balance = $this->opening_balance;
        $Customer->credit_limit = $this->credit_limit;
        $Customer->save();

        $CustomerInfo = new ContactInfo();
        $CustomerInfo->user_id = Auth::id();
        $CustomerInfo->contact_id = $Customer->id;
        $CustomerInfo->name = $this->name;
        $CustomerInfo->mobile = $this->mobile;
        $CustomerInfo->save();



        if($storeType == 'new'){
            $this->reset();
        }else{
            $this->customer_id = $Customer-> id;
        }
        if($this->customer_id) {
            $message = 'Customer Updated Successfully!';
        } else {
            $message = 'Customer Added Successfully!';
        }

        $this->alert('success', $message);
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
            $this->opening_balance = $Customer->opening_balance;
            $this->credit_limit = $Customer->credit_limit;

            $CustomerInfo = ContactInfo::find($this->customer_id);
            $this->name = $CustomerInfo->name;
            $this->mobile = $CustomerInfo->mobile;

        }

    }
    public function render()
    {
        $group = ContactGroup::all();
        $country = Country::all();
        return view('pages.backend.contact.customer-details', compact('group','country'));
    }
}

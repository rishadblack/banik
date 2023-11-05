<?php

namespace App\Pages\Backend\Contact;

use App\Models\Country;
use Livewire\Attributes\Url;
use Livewire\WithFileUploads;
use App\Http\Common\Component;
use App\Models\Contact\Contact;
use Livewire\Attributes\Layout;
use App\Models\Contact\ContactInfo;
use App\Models\Contact\ContactGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


#[Layout('layouts.backend')]
class SupplierDetails extends Component
{
    use WithFileUploads;
    #[Url]
    public $supplier_id;
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

    public function storeSupplier($storeType = null)
    {

        $this->validate([
            'code' => 'required|string',


        ]);

        $Supplier = Contact::findOrNew($this->supplier_id);

        $Supplier->user_id = Auth::id();
        $Supplier->code = $this->code;
        $Supplier->mobile = $this->mobile;
        $Supplier->type = 2;
        $Supplier->contact_group_id = $this->contact_group_id;
        $Supplier->company_name = $this->company_name;
        $Supplier->country_id = $this->country_id;
        $Supplier->state_id = $this->state_id;
        $Supplier->postcode = $this->postcode;
        $Supplier->address = $this->address;
        $Supplier->opening_balance = $this->opening_balance;
        $Supplier->credit_limit = $this->credit_limit;
        $Supplier->save();

        $SupplierInfo = new ContactInfo();
        $SupplierInfo->user_id = Auth::id();
        $SupplierInfo->contact_id = $Supplier->id;
        $SupplierInfo->name = $this->name;
        $SupplierInfo->mobile = $this->mobile;
        $SupplierInfo->save();


        if($storeType == 'new'){
            $this->reset();
        }else{
            $this->supplier_id = $Supplier-> id;
        }
        if($this->supplier_id) {
            $message = 'Supplier Updated Successfully!';
        } else {
            $message = 'Supplier Added Successfully!';
        }

        $this->alert('success', $message);
    }

    public function mount()
    {
        if($this->supplier_id) {
            $Supplier = Contact::find($this->supplier_id);
            $this->code = $Supplier->code;
            $this->mobile = $Supplier->mobile;
            $this->contact_group_id = $Supplier->contact_group_id;
            $this->company_name = $Supplier->company_name;
            $this->country_id = $Supplier->country_id;
            $this->postcode = $Supplier->postcode;
            $this->state_id = $Supplier->state_id;
            $this->address = $Supplier->address;
            $this->opening_balance = $Supplier->opening_balance;
            $this->credit_limit = $Supplier->credit_limit;

            $Supplier = ContactInfo::find($this->supplier_id);
            $this->name = $Supplier->first_name;
            $this->mobile = $Supplier->mobile;

        }
    }
    public function render()
    {
        $group = ContactGroup::all();
        $country = Country::all();
        return view('pages.backend.contact.supplier-details',compact('group','country'));
    }
}

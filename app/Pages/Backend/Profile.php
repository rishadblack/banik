<?php

namespace App\Pages\Backend;

use Livewire\WithFileUploads;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.backend')]
class Profile extends Component
{
    use WithFileUploads;

    // profile
    public $name;
    public $profile_image;
    public $profile_image_preview;
    public $email;
    public $phone;
    public $street;
    public $city;
    public $postal_code;
    public $state;
    public $country;

    // password
    public $current_password;
    public $password;
    public $password_confirmation;

    public function storePasswordChange()
    {
        $this->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);


        if (Hash::check($this->current_password, Auth::User()->password)) {
            $user = Auth::User();
            $user->password = Hash::make($this->password);
            $user->save();
        } else {
            $this->addError('current_password', 'Current password is wrong please try again..');

            return true;
        }

        $this->reset([
            'current_password',
            'password',
            'password_confirmation',
        ]);

        $this->alert('success', 'Your new password updated successfully');
    }

    public function storeProfileUpdate()
    {

        $this->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'max:255'],
            'profile_image' => ['nullable', 'image', 'max:1024'],
            'phone' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'country' => ['required'],
        ]);




        $User = Auth::User();

        if ($this->profile_image) {
            if ($User->profile_image) {
                if (Storage::disk('public')->exists($User->profile_image)) {
                    Storage::disk('public')->delete($User->profile_image);
                }
            }
            $User->profile_image = $this->profile_image->store('profile', 'public');
        }

        $User->name = $this->name;
        $User->email = $this->email;
        $User->phone = $this->phone;
        $User->street = $this->street;
        $User->city = $this->city;
        $User->postal_code = $this->postal_code;
        $User->state = $this->state;
        $User->country = $this->country;
        $User->save();


        $this->alert('success', 'Your profile updated successfully');
    }

    public function mount()
    {
        $User = Auth::User();
        $this->name = $User->name;
        $this->profile_image_preview = $User->profile_image ? asset_storage($User->profile_image) : null;
        $this->email = $User->email;
        $this->phone = $User->phone;
        $this->street = $User->street;
        $this->city = $User->city;
        $this->postal_code = $User->postal_code;
        $this->state = $User->state;
        $this->country = $User->country;
    }
    public function render()
    {
        return view('pages.backend.profile');
    }
}

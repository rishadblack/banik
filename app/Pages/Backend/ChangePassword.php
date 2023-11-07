<?php

namespace App\Pages\Backend;


use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

#[Layout('layouts.backend')]
class ChangePassword extends Component
{
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
            $user->password =$this->password;
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
    public function render()
    {
        return view('pages.backend.change-password');
    }
}

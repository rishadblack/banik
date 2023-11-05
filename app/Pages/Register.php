<?php

namespace App\Pages;

use App\Models\User;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.auth')]
class Register extends Component
{
    public $name;
    public $password;
    public $password_confirmation;
    public $email;
    public $country;
    public $gender;
    public $date;

    public function register()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email'],
            'password' => ['required'],

        ]);

        $User = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'country' => $this->country,
            'gender' => $this->gender,
            'date' => $this->date,
        ]);


        $this->reset([
             'name',
             'email',
             'password',
             'country',
             'gender',
             'date',
         ]);


        $this->alert('success', ' Registration success!');

    }


    public function render()
    {
        return view('pages.register');
    }
}

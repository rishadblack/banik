<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $User = User::create([
             'name' => 'Super Admin',
             'email' => 'superadmin@banik',
             'password' => '12345678',
         ]);

        // $User->assignRole('superadmin');
        // $User->givePermissionTo('view.dashboard', 'edit.dashboard');
    }
}

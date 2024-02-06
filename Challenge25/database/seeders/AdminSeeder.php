<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->username = 'Admin';
        $user->email = 'admin@admin.com';
        $user->password = Hash::make('admin1234');
        $user->role_id = Role::where('name', 'admin')->first()->id;
        $user->save();
        
    } 
}

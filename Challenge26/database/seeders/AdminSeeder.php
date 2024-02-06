<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /** 
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('name','Admin')->first();

        User::create([
            'name' => 'Admin Admin',
            'role_id' => $role->id,
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin1234'),
        ]);
    }
}

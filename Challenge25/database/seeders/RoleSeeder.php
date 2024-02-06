<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = new Role();
        $role1->name = 'user';
        $role1->save();

        $role2 = new Role();
        $role2->name = 'admin';
        $role2->save();
    }
} 

<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create admin role
        Role::Create([
            'name' => 'admin'
        ]);
        //create user role
        Role::Create([
            'name' => 'user'
        ]);
    }
}

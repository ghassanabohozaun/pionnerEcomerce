<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $first_role_id = Role::first()->id;

        Admin::create([
            'name' => 'Admin',
            'password' => bcrypt('123456'),
            'email' => 'admin@admin.com',
            'role_id' => $first_role_id,
        ]);

        Admin::create([
            'name' => 'Ghassan',
            'password' => bcrypt('123456'),
            'email' => 'ghassan@admin.com',
            'role_id' => $first_role_id,
        ]);
    }
}

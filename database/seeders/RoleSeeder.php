<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Orchid\Platform\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create([
           'name' => 'Client',
           'slug' => 'client',
        ]);

         Role::create([
              'name' => 'Platform Admins',
              'slug' => 'platform-admins',
         ]);

        Role::create([
            'name' => 'Super Admin',
            'slug' => 'admin',
        ]);

    }
}

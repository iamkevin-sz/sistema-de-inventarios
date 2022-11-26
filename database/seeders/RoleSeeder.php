<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role =  Role::create(['name' => 'Admin']);
       $role->permissions()->attach([1, 2, 3, 4, 5, 6, 7]);

       $role =  Role::create(['name' => 'Vendedor']);
       $role->permissions()->attach([1, 2, 3, 4, 5, 6, 7]);

       $role =  Role::create(['name' => 'gerente']);
       $role->permissions()->attach([1, 6, 7]);

    }
}

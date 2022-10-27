<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'customer']);
        $role3 = Role::create(['name' => 'viewer']);
        $permission = Permission::create(['name' => 'participants.create'])->syncRoles('admin');
        $permission = Permission::create(['name' => '/participantes/mostrar'])->syncRoles('admin','customer','viewer');
        $permission = Permission::create(['name' => '/participantes/editar'])->syncRoles('admin','customer');
        $permission = Permission::create(['name' => '/participantes/registro'])->syncRoles('admin');
        $permission = Permission::create(['name' => '/participantes/index'])->syncRoles('admin','customer');


        $permission = Permission::create(['name' => '/staff/create'])->syncRoles(['admin','customer']);
        $permission = Permission::create(['name' => '/staff/show'])->syncRoles(['admin','customer','viewer']);
        $permission = Permission::create(['name' => '/staff/edit'])->syncRoles(['admin','customer']);
        $permission = Permission::create(['name' => '/staff/destroy'])->syncRoles(['admin']);
        $permission = Permission::create(['name' => '/staff/index'])->syncRoles(['admin','customer','viewer']);


        $permission = Permission::create(['name' => '/awards/create'])->syncRoles(['admin','customer']);
        $permission = Permission::create(['name' => '/awards/show'])->syncRoles(['admin','customer','viewer']);
        $permission = Permission::create(['name' => '/awards/edit'])->syncRoles(['admin','customer']);
        $permission = Permission::create(['name' => '/awards/destroy'])->syncRoles(['admin']);
        $permission = Permission::create(['name' => '/awards/index'])->syncRoles(['admin','customer','viewer']);

        $permission = Permission::create(['name' => '/roles/create'])->syncRoles(['admin','customer']);
        $permission = Permission::create(['name' => '/roles/show'])->syncRoles(['admin','customer']);
        $permission = Permission::create(['name' => '/roles/edit'])->syncRoles(['admin','customer']);
        $permission = Permission::create(['name' => '/roles/destroy'])->syncRoles(['admin']);
        $permission = Permission::create(['name' => '/roles/index'])->syncRoles(['admin','customer']);


        $permission = Permission::create(['name' => '/disciplinas/index'])->syncRoles(['admin','customer']);
        $permission = Permission::create(['name' => '/disciplinas/create'])->syncRoles(['admin','customer']);
        $permission = Permission::create(['name' => '/disciplinas/edit'])->syncRoles(['admin','customer']);
        $permission = Permission::create(['name' => '/disciplinas/destroy'])->syncRoles(['admin']);

    }
}

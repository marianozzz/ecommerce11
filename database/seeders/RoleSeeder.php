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
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Invitado']);
        $role3 = Role::create(['name' => 'Supervisor']);
        $role4 = Role::create(['name' => 'Registrado']);

        $permission1 = Permission::create(['name' => 'admin.index'])->syncRoles([$role1]);
        $permission2 = Permission::create(['name' => 'admin.categorias.index'])->syncRoles([$role1]);
        $permission3 = Permission::create(['name' => 'admin.ciudades.index'])->syncRoles([$role1]);
        $permission4 = Permission::create(['name' => 'admin.provincias.index'])->syncRoles([$role1]);
    }
}

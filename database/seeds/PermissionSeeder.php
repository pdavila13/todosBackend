<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'show-task']);
        Permission::create(['name' => 'view-task']);
        Permission::create(['name' => 'create-task']);
        Permission::create(['name' => 'update-task']);
        Permission::create(['name' => 'delete-task']);
        Permission::create(['name' => 'show-user']);
        Permission::create(['name' => 'view-user']);
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'update-user']);
        Permission::create(['name' => 'delete-user']);
    }

}

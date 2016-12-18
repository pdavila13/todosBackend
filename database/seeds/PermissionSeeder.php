<?php

class PermissionSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'show-task']);
    }

}
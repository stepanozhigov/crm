<?php

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
        $roles = ['user', 'admin', 'guest', 'copywriter', 'custom', 'super admin'];

        foreach ($roles as $role) {
            $newRole = new Role([
                'name' => $role,
                'guard_name' => 'web'
            ]);
            $newRole->save();
        }
    }
}

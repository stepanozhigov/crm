<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'bills',
            'discounts',
            'sales-report',
            'tags',
            'payment-methods',
            'translates',
            'comments',
            'constructors',
            'up-sales',
            'mailer',
            'products',
            'clients',
            'users',
            'pages',
        ];

        foreach ($permissions as $permission) {
            $newPermission = new Permission([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
            $newPermission->save();

        }
    }
}

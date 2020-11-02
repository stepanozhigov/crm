<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->status = User::STATUS_ACTIVE;
        $user->password = Hash::make('admin');
        $user->save();

        $user->assignRole('super admin');
    }
}

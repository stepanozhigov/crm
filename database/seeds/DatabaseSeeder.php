<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(DefaultUserSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(ProjectSeeder::class);
         $this->call(ProductSeeder::class);
        $this->call(BillSeeder::class);
        $this->call(BillProductSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(LanguageSeeder::class);
    }
}

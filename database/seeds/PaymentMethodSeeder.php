<?php

use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods = [
            ['name' => 'РБК', 'status' => \App\Models\PaymentMethod::STATUS_ACTIVE],
            ['name' => 'Yandex', 'status' => \App\Models\PaymentMethod::STATUS_ACTIVE],
            ['name' =>'PayPal', 'status' => \App\Models\PaymentMethod::STATUS_ACTIVE],
            ['name' => 'Другое', 'status' => \App\Models\PaymentMethod::STATUS_ACTIVE],
        ];

        \App\Models\PaymentMethod::insert($methods);
    }
}

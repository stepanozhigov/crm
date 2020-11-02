<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            ['language' =>'es', 'status' => \App\Models\Language::STATUS_ACTIVE],
            ['language' => 'pt_BR', 'status' => \App\Models\Language::STATUS_ACTIVE],
            ['language' => 'tr', 'status' => \App\Models\Language::STATUS_ACTIVE],
            ['language' => 'en', 'status' => \App\Models\Language::STATUS_INACTIVE],
        ];

        \App\Models\Language::insert($languages);
    }
}

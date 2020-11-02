<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            [
                'name' => 'Проект ВМ',
                'domain' => 'lkvm.',
                'language' => 'ru',
            ],
            [
                'name' => 'Проект ВД',
                'domain' => 'lkvd.',
                'language' => 'ru',
            ],
            [
                'name' => 'Проект ВЖ',
                'domain' => 'domain.com',
                'language' => 'ru',
            ],
            [
                'name' => 'Проект ВП',
                'domain' => 'domain.com',
                'language' => 'ru',
            ],
            [
                'name' => 'Проект ИМ',
                'domain' => 'domain.com',
                'language' => 'ru',
            ],
            [
                'name' => 'Проект ВД Spain',
                'domain' => 'domain.com',
                'language' => 'es',
            ],
            [
                'name' => 'Проект ВД Бразилия',
                'domain' => 'domain.com',
                'language' => 'pt_BR',
            ],
            [
                'name' => 'Проект ВД Турция',
                'domain' => 'domain.com',
                'language' => 'tr',
            ],
            [
                'name' => 'Проект ВД Английский',
                'domain' => 'domain.com',
                'language' => 'en',
            ],
        ];


        DB::table('projects')->insert($projects);
    }
}

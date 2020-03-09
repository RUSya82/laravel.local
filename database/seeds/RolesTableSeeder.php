<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert($this->getData());
    }

    private function getData()
    {
        $data = [];

        $data = [
            [
                'role' => 'custom',
                'description' => 'Пользователь',
            ],
            [
                'role' => 'author',
                'description' => 'Автор',
            ],
            [
                'role' => 'editor',
                'description' => 'Редактор',
            ],
            [
                'role' => 'admin',
                'description' => 'Администратор',
            ]
        ];

        return $data;
    }
}

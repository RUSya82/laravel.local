<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData()
    {
        $data = [];

            $data = [
                [
                    'name' => 'govenment',
                    'description' => 'Политика',
                ],
                [
                    'name' => 'sport',
                    'description' => 'Спорт',
                ],
                [
                    'name' => 'economic',
                    'description' => 'Экономика',
                ],
                [
                    'name' => 'society',
                    'description' => 'Общество',
                ],
                [
                    'name' => 'ecology',
                    'description' => 'Экология',
                ],
            ];

        return $data;
    }
}

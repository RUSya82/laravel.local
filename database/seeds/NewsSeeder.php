<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Faker\Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(20, 50)),
                'content' => $faker->realText(rand(1000, 2000)),
                'category_id'=> $faker->numberBetween(1,5),
                'isModerated' => true,
                'image' => "",
                'author' => $faker->name,
            ];
        }
        return $data;
    }
}

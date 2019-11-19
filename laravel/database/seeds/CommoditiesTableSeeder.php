<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CommoditiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 100; $i++) {
            DB::table('commodities')->insert([
                'user_id' => mt_rand(1, 10),
                'name' => $faker->domainWord,
                'price' => mt_rand(1000, 100000),
                'image_path' => null,
                'description' => $faker->text($maxNbChars = 200),
                'is_dealings' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}

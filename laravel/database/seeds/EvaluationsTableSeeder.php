<?php

use Illuminate\Database\Seeder;

class EvaluationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 1000; $i++) {
            DB::table('evaluations')->insert([
                'user_id' => mt_rand(1, 9),
                'star' => mt_rand(1, 5),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
        for($i = 0; $i < 10; $i++) {
            DB::table('evaluations')->insert([
                'user_id' => 10,
                'star' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }

    }
}

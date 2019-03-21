<?php

use Illuminate\Database\Seeder;

class ClassificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i <= 20 ; $i++){
            $faker = Faker\Factory::create();

            DB::table('classifications')->insert([
                'descricao' => $faker->text(30),
                'created_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class ProviderTableSeeder extends Seeder
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

            DB::table('providers')->insert([
                'name' => $faker->company(30),
                'created_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}

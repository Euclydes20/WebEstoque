<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
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

            DB::table('products')->insert([
                'descricao' => $faker->text(100),
                'qtd' => $faker->randomNumber(),
                'prc_venda' => $faker->randomFloat(2,100, 200),
                'prc_compra' => $faker->randomFloat(2,100, 200),
                'created_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}

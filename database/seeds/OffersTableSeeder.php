<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Offer;

use Faker\Factory as Faker;

class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

      // Offer::truncate();
      $jornades = ['Complerta', 'Parcial', 'Flexible'];
      $contract_types = ['Indefinit', 'Conveni', 'Pràctiques', 'Voluntari'];
      for ($i = 1; $i < 50; $i++){
        Offer::create([
          'empresa_id' => rand(1,\App\Empresa::count()),
          'title' => $faker->jobTitle,
          'description' => $faker->text($maxNbChars = 500),
          'study_id' => rand(1,11),
          'requirements' => $faker->text,
          'jornada' => $jornades[array_rand($jornades)],
          'contract_type' => $contract_types[array_rand($contract_types)],
          'salary' => rand(0,10000) . ' euros/mes',
        ]);
      }
    }
}

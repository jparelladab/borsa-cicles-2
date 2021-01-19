<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Empresa;
use App\User;
use Faker\Factory as Faker;

class EmpresesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Empresa::truncate();
        $users = User::where('role_id', 3)->get();
        foreach ($users as $user){
          Empresa::create([
            'company_name' => $faker->company,
            'website' => $faker->domainName,
            'contact_person' => $faker->name,
            'phone_number' => $faker->e164PhoneNumber,
            'user_id' => $user->id,
            'description' => $faker->text($maxNbChars = 200),
          ]);

        }
        
    }
}

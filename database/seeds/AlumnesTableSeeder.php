<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Alumne;
use App\Study;
use App\User;
use Faker\Factory as Faker;

class AlumnesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $faker = Faker::create();

        $users = User::where('role_id', 2)->get();
        foreach($users as $user){
          $alumne = Alumne::create([
            'first_name' => $faker->firstName,
            'last_name_1' => $faker->lastName,
            'last_name_2' => $faker->lastName,
            'DNI' => $faker->ean8,
            'date_of_birth' => $faker->date($format = 'Y-m-d'),
            'location' => $faker->city,
            'zip_code' => $faker->postcode,
            'address' => $faker->address,
            'phone_number' => $faker->e164PhoneNumber,
            'study_end' => rand(2015, 2020),
            'valoracio' => $faker->text,
            'user_id' => $user->id,
          ]);
          $alumne->studies()->detach();
          $alumne->studies()->attach(Study::find(rand(1,11)));
          $alumne->save();
        }


    }
}

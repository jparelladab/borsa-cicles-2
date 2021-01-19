<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;


use Faker\Factory as Faker;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      
      User::create([
        'role_id' => 1,
        'email' => 'admin@test.com',
        'is_verified' => true,
        'password' => bcrypt('password'),
      ]);
      Admin::create([
        'name' => 'Maria Serra',
        'user_id' => 1
      ]);

      for ($i = 1; $i<10; $i++){
        User::create([
          'role_id' => rand(2,3),
          'email' => $faker->email,
          'password' => bcrypt('password'),
          'is_verified' => 1,
        ]);
      }

    }
}

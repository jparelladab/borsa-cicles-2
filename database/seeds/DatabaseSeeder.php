<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use App\Study;
use App\Offer;
use App\Role;
use App\Alumne;
use App\Empresa;
use App\Admin;
use App\Other_study;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;




//use Database\Seeders\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      // \App\Models\User::factory(10)->create();
      // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      Schema::disableForeignKeyConstraints();

      Admin::truncate();
      User::truncate();
      Study::truncate();
      Alumne::truncate();
      Empresa::truncate();
      Admin::truncate();
      Role::truncate();
      Offer::truncate();
      // DB::table('alumne_offer')->truncate();




      $this->call([
        RolesTableSeeder::class,
        UsersTableSeeder::class, 
        StudiesTableSeeder::class, 
        AlumnesTableSeeder::class, 
        EmpresesTableSeeder::class, 
        OffersTableSeeder::class, 
        ApplicationsSeeder::class]);

      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
      Schema::enableForeignKeyConstraints();
    }
}

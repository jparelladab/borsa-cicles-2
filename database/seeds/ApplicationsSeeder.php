<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Alumne;
use App\Offer;

class ApplicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $alumnes = Alumne::all();
      $offers = Offer::all();

      foreach($alumnes as $alumne) {
        $alumne->applications()->detach();
        foreach($alumne->studies as $study) {
          foreach($offers as $offer){
            if ($offer->study_id === $study->id){
              if (rand(0,1)){
                $alumne->applyTo($offer->id);
              }
            }
          }
        }
      }


    }
}

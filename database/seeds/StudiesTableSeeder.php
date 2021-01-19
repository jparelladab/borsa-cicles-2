<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Study;

class StudiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Study::truncate();
      Study::create([
        'title' => "Assistència al Producte Gràfic Interactiu (APGI)"
      ]);
      Study::create([
        'title' => "Autoedició"
      ]);
      Study::create([
        'title' => "Conducció d'Activitats FísicoEsportives en el Medi Natural (CAFEMN)"
      ]);

      Study::create([
        'title' => "Gràfica Interactiva (GI)"
      ]);
      Study::create([
        'title' => "Gràfica Publicitària (GP)"
      ]);
      Study::create([
        'title' => "Condicionament Físic (CF) / AAFE Fitness & Wellness"
      ]);
      Study::create([
        'title' => "Ensenyament i Animació Socioesportiva (EAS) / AAFE Outdoor"
      ]);
      Study::create([
        'title' => "Projectes i Direcció d'Obres de Decoració"
      ]);
      Study::create([
        'title' => "ASI"
      ]);
      Study::create([
        'title' => "DAI"
      ]);
      Study::create([
        'title' => "Secretariat"
      ]);
    }
}

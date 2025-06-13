<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Categorie::create(
            [
                'libelle' => "Alimentaire"
            ]
        );
        Categorie::create(
            [
                'libelle' => "Electronique"
            ]
        );
        Categorie::create(
            [
                'libelle' => "Chimique"
            ]
        );

    }
}

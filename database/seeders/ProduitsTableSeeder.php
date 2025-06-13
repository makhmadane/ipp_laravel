<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produit::create([
            "libelle" => "lait",
            "qt" => 12,
            "description" => "Slut",
            "categorie_id" => 1,
            "prix" => 100

        ]);
    }
}

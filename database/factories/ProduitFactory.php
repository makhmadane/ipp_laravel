<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "libelle" => $this->faker->word(),
            "qt"=> $this->faker->numberBetween(1,100),
            "prix"=> $this->faker->numberBetween(1,100),
            "description"=> $this->faker->paragraph(),
            "photo" =>  $this->faker->imageUrl(),
            "categorie_id" =>  Categorie::all()->random()->id,
        ];
    }
}

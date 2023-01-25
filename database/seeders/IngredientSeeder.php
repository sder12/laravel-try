<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = ['succo di limone', 'sciroppo', 'vodka', 'bourbon'];

        foreach ($ingredients as $ingredient) {

            $new_ingredient = new Ingredient();
            $new_ingredient->name = $ingredient;
            $new_ingredient->save();
        }
    }
}

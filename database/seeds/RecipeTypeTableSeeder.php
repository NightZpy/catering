<?php

use App\Models\Kitchen\Recipe\RecipeType;
use Illuminate\Database\Seeder;

class RecipeTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Eloquent::unguard();
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        RecipeType::truncate();
        for ($i=1; $i <= 20; $i++) { 
            $recipeTypes = [
                'name' => "RecipeType-$i"
            ];
            RecipeType::create($recipeTypes);
        }
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

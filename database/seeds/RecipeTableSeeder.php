<?php
use App\Models\Kitchen\Recipe\Recipe;
use Illuminate\Database\Seeder;

class RecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    	Recipe::truncate();
        $length = 50;
        for ($i=0; $i < $length; $i++) { 
            $name = 'Recipe-' . $i;
            $description = 'Receta Descripción ' . $i;
            $recipe = [
                'name' => $name,
                'servings_quantity' => rand(1, 9999),
                'description' => $description,
                'type_id' => rand(1, 20),
            ];  
            Recipe::create($recipe);
        }
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    }
}

<?php
use App\Models\Kitchen\Recipe\BaseRecipe;
use App\Models\Unit;
use App\Models\Type;
use App\Models\SubFamily;
use App\Models\Presentation;
use Illuminate\Database\Seeder;

class BaseRecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	BaseRecipe::truncate();
        $length = 100;
        for ($i=0; $i < $length; $i++) { 
            $name = 'BaseRecipe-' . $i;
            $description = 'Receta Base Descripción ' . $i;
            $baseRecipe = [
                'name' => $name,
                'servings_quantity' => rand(1, 9999),
                'quantity' => rand(1, 9999),
                'description' => $description,
                'type_id' => rand(1, 20),
            ];  
            BaseRecipe::create($baseRecipe);
        }
    }
}

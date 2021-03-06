<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

//use App\Database\Seeds\ProviderTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();
        // $this->call(UsersTableSeeder::class);
        $this->call(ProviderTableSeeder::class);
        $this->call(PresentationTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(FamilyTableSeeder::class);
        $this->call(SubFamilyTableSeeder::class);
        $this->call(ItemTableSeeder::class);
        $this->call(ItemProviderTableSeeder::class);
        $this->call(UtensilCategoryTableSeeder::class);
        $this->call(UtensilTableSeeder::class);
        $this->call(RecipeTypeTableSeeder::class);
        $this->call(BaseRecipeTableSeeder::class);
        $this->call(RecipeTableSeeder::class);
        Model::reguard();
    }
}

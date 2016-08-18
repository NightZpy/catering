<?php

use App\Models\Kitchen\UtensilCategory;
use Illuminate\Database\Seeder;

class UtensilCategoryTableSeeder extends Seeder
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
        UtensilCategory::truncate();
        for ($i=1; $i <= 20; $i++) { 
            $utensilCategory = [
                'name' => "UtensilCategory-$i"
            ];
            UtensilCategory::create($utensilCategory);
        }
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

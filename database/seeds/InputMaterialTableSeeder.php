<?php

use App\Models\InputMaterial;
use Illuminate\Database\Seeder;

class InputMaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	InputMaterial::truncate();
	    factory(InputMaterial::class, 8)->create();   
    }
}

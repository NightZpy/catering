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
        $names = [
                'Atún',
                'Harina',
                'Uvas',
                'Salsa',
                'Queso',
                'Arroz',
                'Canela',
                'Aceite'
            ];
        foreach ($names as $key => $value) {
            $material = [
                'name' => $value, 
                'code' => $key + 1,
            ];  
            InputMaterial::create($material);
        }
    }
}

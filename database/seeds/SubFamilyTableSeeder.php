<?php

use App\Models\SubFamily;
use Illuminate\Database\Seeder;

class SubFamilyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	SubFamily::truncate();
        for ($i=1; $i <= 60; $i++) { 
            $familyCode =  rand(1, 20);
            $inputMaterialCode = rand(1, 8);
            $subFamily = [
                'name' => "SubFamily-$i", 
                'code' => $i,
                'input_material_id' => $inputMaterialCode,
                'family_id' => $familyCode
            ];
            SubFamily::create($subFamily);
        }
    }
}

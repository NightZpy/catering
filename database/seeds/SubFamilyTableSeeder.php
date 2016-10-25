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
            $subFamily = [
                'name' => "SubFamily-$i", 
                'family_id' => $familyCode
            ];
            SubFamily::create($subFamily);
        }
    }
}

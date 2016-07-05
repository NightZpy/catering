<?php

use App\Models\Family;
use Illuminate\Database\Seeder;

class FamilyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Family::truncate();
	    factory(Family::class, 20)->create();   
    }
}

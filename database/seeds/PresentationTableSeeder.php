<?php

use App\Models\Presentation;
use Illuminate\Database\Seeder;

class PresentationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Presentation::truncate();
	    factory(Presentation::class, 3)->create();   
    }
}

<?php
use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Unit::truncate();
	    factory(Unit::class, 3)->create(); 
    }
}

<?php
use App\Models\Kitchen\Provider;
use Illuminate\Database\Seeder;

class ProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Provider::truncate();
	    factory(Provider::class, 20)->create();      
    }
}

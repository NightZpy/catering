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
        \Eloquent::unguard();
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Provider::truncate();
        factory(Provider::class, 20)->create();      
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

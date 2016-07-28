<?php

use App\Models\Kitchen\Item;
use App\Models\Kitchen\Provider;
use Illuminate\Database\Seeder;

class ItemProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('item_provider')->delete();
        $itemList = array_chunk(Item::all()->toArray(), Provider::count());
        $providers = Provider::all();

        foreach ($providers as $provider) {
            foreach ($itemList as $items) {
                $first = true;
                $selected = false;
                foreach ($items as $item) {
                    $price = rand(1, 10000);
                    $selected = $first;
                    $provider->items()->attach($item['id'], compact('price', 'selected'));
                    $first = false;
                }
            }
        }
    }
}

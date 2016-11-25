<?php

use Illuminate\Database\Seeder;
use App\Models\Kitchen\ItemType;

class ItemTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	ItemType::truncate();
        for ($i=1; $i <= 20; $i++) { 
            $itemType = [
                'name' => "ItemType-$i", 
            ];
            ItemType::create($itemType);
        }
    }
}

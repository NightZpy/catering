<?php
use App\Models\Kitchen\Item;
use App\Models\Unit;
use App\Models\Type;
use App\Models\SubFamily;
use App\Models\Presentation;
use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
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
        Item::truncate();
        $units = Unit::all();
        $types = Type::all();
        $presentations = Presentation::all();
        $itemNames = ['Atún',
                'Harina', 'Uvas', 'Salsa', 'Queso', 'Arroz', 'Canela', 'Aceite','Table Settings', 'Dinner plates', 'Bread plates', 'Salad plates', 'Water glasses', 'Wine glasses', 'Coffee cups with saucer', 'Silverware settings', 'Linen or paper napkins', 'Tablecloths', 'Table centerpieces', 'Salt and pepper shakers', 'Sugar holders', 'Butter holders', 'Serving Equipment', 'Serving trays', 'Bus tubs', 'Water pitchers', 'Buffet Equipment', 'Plates', 'Silverware rolls', 'Bread Basket', 'Chaffing Dishes', 'Fuel cells for chaffing dishes', 'Lighter or matches for fuel cells', 'Tongs', 'Serving spoons', 'Spatulas', 'Cutting board (for beefs, hams, turkey) Sharp knife for cutting', 'Rags (for spills) Decorations (seasonal flowers, ect.) Coffee/Beverage Station', 'Air-pots for coffee, decaf and hot water', 'Water pitchers', 'Iced tubs for soda, juice and other cold drinks', 'Drinking straws', 'Drink stirrers', 'Cocktail napkins', 'Coffee cups', 'Water glasses', 'Basket of assorted teas and or hot cocoa', 'Basket of sugar packets', 'Small wastebasket'];
        $length = 100;
        for ($i=0; $i < $length; $i++) { 
            $name = 'Item-' . $i;            
            if ($i < count($itemNames))            
                $name = $itemNames[$i];
            
            $item = [
                'code' => $i,
                'name' => $name,
                'auto_provider' => rand(0, 1),
                'perishable' => rand(0, 1),
                'min_stock' => rand(10, 100),
                'current_stock' => rand(1, 9999),
                'to_buy' => rand(1, 9999),
                'currency' => '$',
                'unit_id' => $units[rand(0, 2)]->id,
                'type_id' => $types[rand(0, 2)]->id,
                'presentation_id' => $presentations[rand(0, 2)]->id,
                'sub_family_id' => SubFamily::whereCode(rand(1, 60))->first()->id
            ];  
            Item::create($item);
        }
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

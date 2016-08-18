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
        \Eloquent::unguard();
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Family::truncate();
        for ($i=1; $i <= 20; $i++) { 
            $family = [
                'name' => "Family-$i", 
                'code' => $i,
            ]; 
            Family::create($family);
        }
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

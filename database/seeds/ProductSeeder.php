<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        // default data
        $products = array(
            array(
            	'name' => 'Milk', 
            	'description' => 'Nutritrous drink', 
            	'type' => '1', 
            	'price' => '100', 
            	'stock' => '50',
            	'image' => '/img/products/milk.svg',
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
            	'name' => 'Mushroom', 
            	'description' => 'Edible fungus', 
            	'type' => '1', 
            	'price' => '120', 
            	'stock' => '30',
            	'image' => '/img/products/mushroom.svg',
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
            	'name' => 'Pasta', 
            	'description' => 'Italian classic', 
            	'type' => '1', 
            	'price' => '200', 
            	'stock' => '15',
            	'image' => '/img/products/pasta.svg',
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
            	'name' => 'Knife', 
            	'description' => 'For cutting stuffs', 
            	'type' => '2', 
            	'price' => '1000', 
            	'stock' => '20',
            	'image' => '/img/products/knife-2.svg',
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
            	'name' => 'Pan', 
            	'description' => 'For cooking stuffs', 
            	'type' => '2', 
            	'price' => '2000', 
            	'stock' => '10',
            	'image' => '/img/products/pan.svg',
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
            	'name' => 'Mixer', 
            	'description' => 'Vroom vroom...', 
            	'type' => '2', 
            	'price' => '1500', 
            	'stock' => '25',
            	'image' => '/img/products/mixer.svg',
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
            	'name' => 'Teapot', 
            	'description' => 'Keep calm', 
            	'type' => '2', 
            	'price' => '1200', 
            	'stock' => '25',
            	'image' => '/img/products/teapot.svg',
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
            	'name' => 'Pot', 
            	'description' => 'Large stuffs', 
            	'type' => '2', 
            	'price' => '2500', 
            	'stock' => '25',
            	'image' => '/img/products/pot.svg',
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
            	'name' => 'Spaghetti', 
            	'description' => 'Pasta & mushrooms', 
            	'type' => '3', 
            	'price' => '700', 
            	'stock' => '10',
            	'image' => '/img/products/spaguetti.svg',
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
            	'name' => 'Sushi', 
            	'description' => 'Japanese classic', 
            	'type' => '3', 
            	'price' => '1000', 
            	'stock' => '5',
            	'image' => '/img/products/sushi.svg',
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
        );
        // data insert
        DB::table('products')->insert($products);
    }
}

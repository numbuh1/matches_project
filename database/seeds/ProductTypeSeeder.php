<?php

use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('product_types')->truncate();
        // default data
        $productTypes = array(
            array(
                'name' => 'Ingredients',
                'image' => '/img/products/groceries.svg'
            ),
            array(
                'name' => 'Tools',
                'image' => '/img/products/knives.svg'
            ),
            array(
                'name' => 'Meals',
                'image' => '/img/products/turkey.svg'
            ),
        );
        // data insert
        DB::table('product_types')->insert($productTypes);
    }
}

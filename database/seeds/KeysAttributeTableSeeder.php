<?php

use Illuminate\Database\Seeder;

class KeysAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_attribute_keys')->insert([['name' => 'Color'],['name' => 'Size']]);
    }
}

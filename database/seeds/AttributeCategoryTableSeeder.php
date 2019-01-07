<?php

use Illuminate\Database\Seeder;

class AttributeCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_categories')->insert([
            [
                'name'  => 'Baisc',
                'description' => 'This attribute category is the generic attribute for the application.'
            ],[
                'name'  => 'Social Media',
                'description' => 'This attribute category is the social media attribute for the application.'
            ],[
                'name'  => 'Custom',
                'description' => 'This attribute category is the Client defined attribute for the application.'
            ],[
                'name'  => 'Graphics',
                'description' => 'This attribute category is the Client defined attribute for the application.'
            ]
        ]);
    }
}

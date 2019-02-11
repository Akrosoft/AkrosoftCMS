<?php

use Illuminate\Database\Seeder;

class TemplateElementCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('template_element_categories')->insert([
            [
                'name'  => 'menu',
                'description' => 'This is the default description. Please update me.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'name'  => 'footer',
                'description' => 'This is the default description. Please update me.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],
            [
                'name'  => 'carousel',
                'description' => 'This is the default description. Please update me.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'name'  => 'hero',
                'description' => 'This is the default description. Please update me.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'name'  => '1 column',
                'description' => 'This is a column per row layout.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'name'  => '2 columns',
                'description' => 'This is a two column per row layout.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'name'  => '3 columns',
                'description' => 'This is a three column per row layout.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'name'  => '4 columns',
                'description' => 'This is a four column per row layout.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class MenuCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_categories')->insert([
           [
            'label'  => 'manager',
            'description' => 'manager menu category is a category label for all menu item not classified as one category listed below.',
           ],
           [
            'label'  => 'contact manager',
            'description' => 'contact menu category is a category label for all menu item that manages or handles client contacts management.',
           ],
           [
            'label'  => 'content manager',
            'description' => 'content menu category is a category label for all menu item that manages or handles site content management.',
           ],
           [
            'label'  => 'email manager',
            'description' => 'email menu category is a category label for all menu item that manages or handles email management.',
           ],
        ]);
    }
}

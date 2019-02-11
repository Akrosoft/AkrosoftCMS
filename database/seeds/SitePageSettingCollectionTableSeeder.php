<?php

use Illuminate\Database\Seeder;

class SitePageSettingCollectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_page_setting_collections')->insert([
            [
                'name'  => 'template',
                'label' => 'Site Template',
                'category_id'  => 1,
                'description' => 'This is the default description. Please update me.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'name'  => 'menu',
                'label' => 'Site Menu',
                'category_id'  => 2,
                'description' => 'This is the default description. Please update me.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'name'  => 'footer',
                'label' => 'Site Footer',
                'category_id'  => 3,
                'description' => 'This is the default description. Please update me.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class SiteSettingsCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_settings_categories')->insert([
            [
                'name'  => 'Site Template',
                'description' => 'This Category define site wide template.'
            ],[
                'name'  => 'Site Menu',
                'description' => 'This Category define site wide template menu.'
            ],[
                'name'  => 'Site Footer',
                'description' => 'This Category define site wide template footer.'
            ]
        ]);
    }
}

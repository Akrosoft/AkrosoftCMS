<?php

use Illuminate\Database\Seeder;

class SitePageSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_page_settings')->insert([
            [
                'collection_id'  => 1,
                'value'  => 1,
                'previous' => null,
                'description' => 'This is the selected value template value.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'collection_id'  => 2,
                'value'  => 4,
                'previous' => null,
                'description' => 'This is the selected value template value.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'collection_id'  => 3,
                'value'  => 1,
                'previous' => null,
                'description' => 'This is the selected value template value.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ]
        ]);
    }
}

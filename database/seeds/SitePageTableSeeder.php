<?php

use Illuminate\Database\Seeder;

class SitePageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_pages')->insert([
            'title' => 'Home Page',
            'slug' => 'home_page',
            'description' => 'This is the site home page and it is shipped by default with Akrosoft CMS',
            'created_at' => date_create(),
            'updated_at' => date_create()
        ]);
    }
}

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
            'title' => 'Home',
            'slug' => 'home',
            'header_title' => 'Home Page',
            'meta_description' => 'This is the site home page and it is shipped by default with Akrosoft CMS',
            'created_at' => date_create(),
            'updated_at' => date_create()
        ]);
    }
}

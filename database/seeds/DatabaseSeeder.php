<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUsersTableSeeder::class);
        $this->call(AttributeCategoryTableSeeder::class);
        $this->call(AttributeCollectionTableSeeder::class);
        $this->call(ResponseCodeTableSeeder::class);
        $this->call(EmailStatusCodeTableSeeder::class);
        $this->call(SitePageTableSeeder::class);
    }
}

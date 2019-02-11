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
        $this->call(TemplateTableSeeder::class);
        $this->call(TemplateElementCategoryTableSeeder::class);
        $this->call(TemplateElementTableSeeder::class);
        $this->call(TemplateElementAttributeTableSeeder::class);
        $this->call(SiteSettingsCategoryTableSeeder::class);
        $this->call(SitePageSettingCollectionTableSeeder::class);
        $this->call(SitePageSettingsTableSeeder::class);
    }
}

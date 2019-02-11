<?php

use Illuminate\Database\Seeder;

class TemplateElementAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('template_element_attributes')->insert([
            [
                'element_id'  => 1,
                'name' => 'mono_logo',
                'label'  => "Logo Image",
                'configuration' => 'auto',
                'target'  => 'logo',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 1,
                'name' => 'mono_useful_links',
                'label'  => "Footer Useful Links",
                'configuration' => 'manual',
                'target'  => 'menu',
                'returned_type' => 'Collection',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 1,
                'name' => 'mono_additional_links',
                'label'  => "Footer Additional Links",
                'configuration' => 'manual',
                'target'  => 'menu',
                'returned_type' => 'Collection',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 1,
                'name' => 'mono_contact_info',
                'label'  => "Contact Info",
                'configuration' => 'auto',
                'target'  => 'contact_info',
                'returned_type' => 'Array',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 1,
                'name' => 'mono_copyright',
                'label'  => "Copy Right",
                'configuration' => 'auto',
                'target'  => 'copyright',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 1,
                'name' => 'mono_social_media',
                'label'  => "Social Media Links",
                'configuration' => 'auto',
                'target'  => 'social_media',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 3,
                'name' => 'mono_logo',
                'label'  => "Logo Image",
                'configuration' => 'auto',
                'target'  => 'logo',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 3,
                'name' => 'mono_copyright',
                'label'  => "Copy Right",
                'configuration' => 'auto',
                'target'  => 'copyright',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 3,
                'name' => 'mono_social_media',
                'label'  => "Social Media Links",
                'configuration' => 'auto',
                'target'  => 'social_media',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 2,
                'name' => 'mono_logo',
                'label'  => "Logo Image",
                'configuration' => 'auto',
                'target'  => 'logo',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 2,
                'name' => 'mono_copyright',
                'label'  => "Copy Right",
                'configuration' => 'auto',
                'target'  => 'copyright',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 2,
                'name' => 'mono_social_media',
                'label'  => "Social Media Links",
                'configuration' => 'auto',
                'target'  => 'social_media',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 2,
                'name' => 'mono_menu_links',
                'label'  => "Footer Selected Links",
                'configuration' => 'manual',
                'target'  => 'menu',
                'returned_type' => 'Collection',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 4,
                'name' => 'mono_site_menu',
                'label'  => "Site Header Menu",
                'configuration' => 'auto',
                'target'  => 'menu',
                'returned_type' => 'Collection',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 5,
                'name' => 'mono_sticky_mini_menu',
                'label'  => "Sticky Mini Menu",
                'configuration' => 'manual',
                'target'  => 'menu',
                'returned_type' => 'Collection',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 5,
                'name' => 'mono_site_menu',
                'label'  => "Site Sticky Menu",
                'configuration' => 'auto',
                'target'  => 'menu',
                'returned_type' => 'Collection',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 6,
                'name' => 'canvas_logo',
                'label'  => "Logo Image",
                'configuration' => 'auto',
                'target'  => 'logo',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 6,
                'name' => 'canvas_contact_info',
                'label'  => "Contact Info",
                'configuration' => 'auto',
                'target'  => 'contact_info',
                'returned_type' => 'Array',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 6,
                'name' => 'canvas_terms_policy_links',
                'label'  => "Footer Special Links",
                'configuration' => 'manual',
                'target'  => 'menu',
                'returned_type' => 'Collection',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 6,
                'name' => 'canvas_copyright',
                'label'  => "Copy Right",
                'configuration' => 'auto',
                'target'  => 'copyright',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 6,
                'name' => 'canvas_social_media',
                'label'  => "Social Media Links",
                'configuration' => 'auto',
                'target'  => 'social_media',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 6,
                'name' => 'canvas_menu_links',
                'label'  => "Footer Selected Links",
                'configuration' => 'manual',
                'target'  => 'menu',
                'returned_type' => 'Collection',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 7,
                'name' => 'canvas_logo',
                'label'  => "Logo Image",
                'configuration' => 'auto',
                'target'  => 'logo',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 7,
                'name' => 'canvas_copyright',
                'label'  => "Copy Right",
                'configuration' => 'auto',
                'target'  => 'copyright',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 7,
                'name' => 'canvas_social_media',
                'label'  => "Social Media Links",
                'configuration' => 'auto',
                'target'  => 'social_media',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 7,
                'name' => 'canvas_menu_links',
                'label'  => "Footer Selected Links",
                'configuration' => 'manual',
                'target'  => 'menu',
                'returned_type' => 'Collection',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 8,
                'name' => 'canvas_logo',
                'label'  => "Logo Image",
                'configuration' => 'auto',
                'target'  => 'logo',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 8,
                'name' => 'canvas_copyright',
                'label'  => "Copy Right",
                'configuration' => 'auto',
                'target'  => 'copyright',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 8,
                'name' => 'canvas_social_media',
                'label'  => "Social Media Links",
                'configuration' => 'auto',
                'target'  => 'social_media',
                'returned_type' => 'String',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 8,
                'name' => 'canvas_menu_links',
                'label'  => "Footer Selected Links",
                'configuration' => 'manual',
                'target'  => 'menu',
                'returned_type' => 'Collection',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'element_id'  => 9,
                'name' => 'canvas_site_menu',
                'label'  => "Site Default Menu",
                'configuration' => 'auto',
                'target'  => 'menu',
                'returned_type' => 'Collection',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class TemplateElementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('template_elements')->insert([
            [
                'template_id'  => 1,
                'category_id' => 2,
                'name'  => 'mono_classic_footer',
                'label' => 'Mono Theme Classic Footer',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'template_id'  => 1,
                'category_id' => 2,
                'name'  => 'mono_clean_footer',
                'label' => 'Mono Theme Clean Footer',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'template_id'  => 1,
                'category_id' => 2,
                'name'  => 'mono_logo_footer',
                'label' => 'Mono Theme Logo Footer',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'template_id'  => 1,
                'category_id' => 1,
                'name'  => 'mono_absolute_fixed_menu',
                'label' => 'Mono Theme Absolute Fixed Menu',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'template_id'  => 1,
                'category_id' => 1,
                'name'  => 'mono_header_sticky_menu',
                'label' => 'Mono Theme Header Sticky Menu',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'template_id'  => 2,
                'category_id' => 2,
                'name'  => 'canvas_default',
                'label' => 'Canvas Theme Default Footer',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'template_id'  => 2,
                'category_id' => 2,
                'name'  => 'canvas_simple_footer',
                'label' => 'Canvas Theme Simple Footer',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'template_id'  => 2,
                'category_id' => 2,
                'name'  => 'canvas_sticky_footer',
                'label' => 'Canvas Theme Sticky Footer',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'template_id'  => 2,
                'category_id' => 1,
                'name'  => 'canvas_default_menu',
                'label' => 'Canvas Theme Default Menu',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ]
        ]);
    }
}

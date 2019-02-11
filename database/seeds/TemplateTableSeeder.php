<?php

use Illuminate\Database\Seeder;

class TemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('templates')->insert([
            [
                'name'  => 'mono',
                'description' => 'This is the default description. Please update me.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'name'  => 'canvas',
                'description' => 'This is the default description. Please update me.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class ResponseCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('response_codes')->insert([
            [
                'response' => 'Not Sent',
                'description' => 'Response not sent yet.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'response' => 'Pending',
                'description' => 'Response sent, but delivery not yet confirmed.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'response' => 'Sent',
                'description' => 'Response has been sent.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ]
        ]);
    }
}

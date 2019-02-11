<?php

use Illuminate\Database\Seeder;

class EmailStatusCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_status_codes')->insert([
            [
                'name' => 'Email Not Sent',
                'description' => 'Email was not sent.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],[
                'name' => 'Email Sent',
                'description' => 'Email sent.',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ]
        ]);
    }
}

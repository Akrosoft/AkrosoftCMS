<?php

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_users')->insert([
            'name'  => 'Ode Akugbe',
            'email' => 'akugbeode@gmail.com',
            'password' => bcrypt('oghogho@1'),
            'profile_image' => '/storage/images/profile/default.png',
        ]);
    }
}

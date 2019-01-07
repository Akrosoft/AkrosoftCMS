<?php

use Illuminate\Database\Seeder;

class AttributeCollectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_collections')->insert([
            [
                'name'  => 'custom',
                'label' => 'Custom (User Defined Attribute)',
                'category_id'  => 3,
                'icon' => "",
                'color' => '#000000',
                'description' => 'This is the default description. Please update me.'
            ],[
                'name'  => 'name',
                'label' => 'Client Name',
                'category_id'  => 1,
                'icon' => "<i class='fas fa-signature'></i>",
                'color' => '#231f20',
                'description' => 'This is the default description. Please update me.'
            ],[
                'name'  => 'logo',
                'label' => 'Client Logo',
                'category_id'  => 4,
                'icon' => "<i class='far fa-images'></i>",
                'color' => '#231f20',
                'description' => 'This is the default description. Please update me.'
            ],[
                'name'  => 'short_name',
                'label' => 'Client Short Name',
                'category_id'  => 1,
                'icon' => "<i class='fas fa-signature'></i>",
                'color' => '#231f20',
                'description' => 'This is the default description. Please update me.'
            ],[
                'name'  => 'login_image',
                'label' => 'Login Page Image',
                'category_id'  => 4,
                'icon' => "<i class='fas fa-sign-in-alt'></i>",
                'color' => '#231f20',
                'description' => 'This is the default description. Please update me.'
            ],[
                'name'  => 'address',
                'label' => 'Client Address',
                'category_id'  => 1,
                'icon' => "<i class='fas fa-map-marker-alt'></i>",
                'color' => '#bd081c',
                'description' => 'This is the default description. Please update me.'
            ],[
                'name'  => 'email',
                'label' => 'Client Email',
                'category_id'  => 1,
                'icon' => "<i class='fas fa-envelope'></i>",
                'color' => '#3c5a99',
                'description' => 'This is the default description. Please update me.'
            ],[
                'name'  => 'phone',
                'label' => 'Client Phone',
                'category_id'  => 1,
                'icon' => "<i class='fas fa-phone'></i>",
                'color' => '#0077b5',
                'description' => 'This is the default description. Please update me.'
            ],[
                'name'  => 'footer',
                'label' => 'Footer Link',
                'category_id'  => 1,
                'icon' => "<i class='fas fa-shoe-prints'></i>",
                'color' => '#000000',
                'description' => 'This is the default description. Please update me.'
            ],[
                'name'  => 'facebook',
                'label' => 'Facebook URL',
                'category_id'  => 2,
                'icon' => "<i class='fab fa-facebook-square'></i>",
                'color' => '#3c5a99',
                'description' => 'This is the default description. Please update me.'
            ],[
                'name'  => 'twitter',
                'label' => 'Twitter URL',
                'category_id'  => 2,
                'icon' => "<i class='fab fa-twitter'></i>",
                'color' => '#38a1f3',
                'description' => 'This is the default description. Please update me.'
            ],[
                'name'  => 'youtube',
                'label' => 'Youtube URL',
                'category_id'  => 2,
                'icon' => "<i class='fab fa-youtube'></i>",
                'color' => '#ed3833',
                'description' => 'This is the default description. Please update me.'
            ],[
                'name'  => 'linkedin',
                'label' => 'Linkedin URL',
                'category_id'  => 2,
                'icon' => "<i class='fab fa-linkedin'></i>",
                'color' => '#0077b5',
                'description' => 'This is the default description. Please update me.'
            ],[
                'name'  => 'google_plus',
                'label' => 'Google Plus URL',
                'category_id'  => 2,
                'icon' => "<i class='fab fa-google-plus-g'></i>",
                'color' => '#dd4b39',
                'description' => 'This is the default description. Please update me.'
            ],[
                'name'  => 'instagram',
                'label' => 'Instagram URL',
                'category_id'  => 2,
                'icon' => "<i class='fab fa-instagram'></i>",
                'color' => '#231f20',
                'description' => 'This is the default description. Please update me.'
            ],[
                'name'  => 'pinterest',
                'label' => 'Pinterest URL',
                'category_id'  => 2,
                'icon' => "<i class='fab fa-pinterest-p'></i>",
                'color' => '#bd081c',
                'description' => 'This is the default description. Please update me.'
            ]
        ]);
    }
}

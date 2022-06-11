<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Basic;
use App\Models\Contactinfo;
use App\Models\socialmedia;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Basic::create([
            'basic_company' => 'Molla Ecommarce',
            'basic_title' => 'Molla Ecommarce Store',
            'basic_header_logo' => '',
            'basic_footer_logo' => '',
            'basic_favicon' => '',
            'basic_status' => 1
        ]);

        Contactinfo::create([
            'contact_phone_one' => '01755781464',
            'contact_phone_two' => '01755781466',
            'contact_email_one' => 'mcshorif@gmail.com',
            'contact_email_two' => 'mcshorif1@gmail.com',
            'contact_address_one' => 'Dhanmondhi, Raja-Bazar,Dhaka-1450',
            'contact_address_two' => '',
            'contact_status' => 1,
        ]);

        socialmedia::create([
            'sm_facebook' => 'facebook',
            'sm_twitter' => 'twitter',
            'sm_linkedin' => 'linkdin',
            'sm_dribbble' => 'dribble',
            'sm_youtube' => 'youtube',
            'sm_slack' => '',
            'sm_instagram' => '',
            'sm_behance' => '',
            'sm_google' => '',
            'sm_reddit' => '',
            'sm_status' => 1,
        ]);
    }
}

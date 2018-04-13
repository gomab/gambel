<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => "Brazza HipHop Blog",
            'address'   => 'Congo, Dolisie',
            'contact_number' => '07 52 42 69 37',
            'contact_email' => 'info@masta.com'
         ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => 'Mohamed Kamal',
            'contact_email' => 'mohamed77zaki@gmail.com',
            'address' => 'address example here',
        ]);
    }
}

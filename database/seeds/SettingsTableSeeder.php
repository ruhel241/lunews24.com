<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        $data = [
            [
                'key' => 'logo',
                'value' => 'logo.png',
            ],

           
            
        ];

        foreach($data as $data)
        {
           Setting::forceCreate($data);
        }
    }


}

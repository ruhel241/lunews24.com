<?php

use Illuminate\Database\Seeder;
use App\Gallery;

class GalleriesTableSeeder extends Seeder
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
                'title' => 'facebook',
                'description' => 'sdfsdfsdf sdfsv ',
				'gallery_img' => '2.jpg',
                
            ],

            [
                'title' => 'facebook',
                'description' => 'sdfsdfsff',
                'gallery_img' => '1.jpg',
			],


            
        ];

        foreach($data as $data)
        {
           Gallery::forceCreate($data);
        }


    }



}

<?php

use Illuminate\Database\Seeder;
use App\Advertisement;

class AdvertisementTableSeeder extends Seeder
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
                'add_image' => '1.jpg',
                'image_url' => 'www.facebook.com',
                'show_hide' => '1',
                'type' => 'top-banner',
            ],

            [
                'title' => 'facebook',
                'add_image' => '5.jpg',
                'image_url' => 'www.facebook.com',
                'show_hide' => '0',
                'type' => 'header-banner',
            ],

            [
                'title' => 'facebook',
                'add_image' => '3.gif',
                'image_url' => 'www.facebook.com',
                'show_hide' => '1',
                'type' => 'PostImage_1',
            ],

            [
                'title' => 'facebook',
                'add_image' => '36.jpg',
                'image_url' => 'www.facebook.com',
                'show_hide' => '0',
                'type' => 'PostImage_2',
            ],

            [
                'title' => 'facebook',
                'add_image' => '9.jpg',
                'image_url' => 'www.facebook.com',
                'show_hide' => '1',
                'type' => 'PostImage_Gif_1',
            ],

            [
                'title' => 'facebook',
                'add_image' => '6.jpg',
                'image_url' => 'www.facebook.com',
                'show_hide' => '1',
                'type' => 'PostImage_3',
            ],

            [
                'title' => 'facebook',
                'add_image' => '3.gif',
                'image_url' => 'www.facebook.com',
                'show_hide' => '0',
                'type' => 'PostImage_4',
            ],

            [
                'title' => 'facebook',
                'add_image' => '9.jpg',
                'image_url' => 'www.facebook.com',
                'show_hide' => '1',
                'type' => 'PostImage_Gif_2',
            ],

            [
                'title' => 'facebook',
                'add_image' => '3.gif',
                'image_url' => 'www.facebook.com',
                'show_hide' => '0',
                'type' => 'SaidarImage_1',
            ],

            [
                'title' => 'facebook',
                'add_image' => '20.jpg',
                'image_url' => 'www.facebook.com',
                'show_hide' => '0',
                'type' => 'SaidarImage_2',
            ],

            [
                'title' => 'facebook',
                'add_image' => '40.gif',
                'image_url' => 'www.facebook.com',
                'show_hide' => '1',
                'type' => 'SaidarImage_3',
            ],

            [
                'title' => 'facebook',
               'add_image' => '3.gif',
                'image_url' => 'www.facebook.com',
                'show_hide' => '0',
                'type' => 'SaidarImage_4',
            ],

            [
                'title' => 'facebook',
                'add_image' => '40.gif',
                'image_url' => 'www.facebook.com',
                'show_hide' => '0',
                'type' => 'SaidarImage_5',
            ],

            
        ];

        foreach($data as $data)
        {
           Advertisement::forceCreate($data);
        }
    }




}



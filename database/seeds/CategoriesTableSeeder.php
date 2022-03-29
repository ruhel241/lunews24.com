<?php

use Illuminate\Database\Seeder;
use App\Category;


class CategoriesTableSeeder extends Seeder
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
                'title' => 'বিভাগীয়',
                'slug' => 'বিভাগীয়',
                
            ],

            [
                'title' => 'সংগঠন',
                'slug' => 'সংগঠন',
                
            ],

            [
                'title' => 'বিজ্ঞপ্তি',
                'slug' => 'বিজ্ঞপ্তি',
                
            ],

            [
                'title' => 'শিক্ষা ক্যাম্পাস',
                'slug' => 'শিক্ষা-ক্যাম্পাস',
                
            ],

            [
                'title' => 'কৃতিত্ব',
                'slug' => 'কৃতিত্ব',
                
            ],

            [
                'title' => 'খেলাধুলা',
                'slug' => 'খেলাধুলা',
                
            ],

            [
                'title' => 'তথ্য প্রযুক্তি',
                'slug' => 'তথ্য-প্রযুক্তি',
            ],

            [
                'title' => 'চাকরির খবর',
                'slug' => 'চাকরির-খবর',
            ],
             
            
            
        ];

        foreach($data as $data)
        {
           Category::forceCreate($data);
        }
    }



}

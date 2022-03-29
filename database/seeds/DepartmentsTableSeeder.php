<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentsTableSeeder extends Seeder
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
                'title' => 'বিবিএ বিভাগ',
                'slug' => 'বিবিএ-বিভাগ',
            ],
			
			[
                'title' => 'সিএসসি বিভাগ',
                'slug' => 'সিএসসি-বিভাগ',
            ],

            [
                'title' => 'ইংরেজি বিভাগ',
                'slug' => 'ইংরেজি-বিভাগ',
            ],

            [
                'title' => 'আর্কিটেকচার  বিভাগ',
                'slug' => 'আর্কিটেকচার-বিভাগ',
            ],

            [
                'title' => 'ল বিভাগ',
                'slug' => 'ল-বিভাগ',
            ],

            [
                'title' => 'সিভিল বিভাগ',
                'slug' => 'সিভিল-বিভাগ',
            ],

            [
                'title' => 'ইইই বিভাগ',
                'slug' => 'ইইই-বিভাগ',
            ], 

            [
                'title' => 'ইসলামিক স্টাডি বিভাগ',
                'slug' => 'ইসলামিক-স্টাডি-বিভাগ',
            ],
 			
 			[
                'title' => 'পাবলিক হেলথ বিভাগ',
                'slug' => 'পাবলিক-হেলথ-বিভাগ',
            ],
			
			[
                'title' => 'হোটেল ম্যানেজমেন্ট বিভাগ',
                'slug' => 'হোটেল-ম্যানেজমেন্ট-বিভাগ',
            ],

           
            
        ];

        foreach($data as $data)
        {
           Department::forceCreate($data);
        }


    }
}

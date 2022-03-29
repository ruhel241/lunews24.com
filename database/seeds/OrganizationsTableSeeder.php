<?php

use Illuminate\Database\Seeder;
use App\Organization;

class OrganizationsTableSeeder extends Seeder
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
                'title' => ' এলইউপিএস',
                'slug' => 'এলইউপিএস',
            ],

            [
                'title' => 'কম্পিউটার ক্লাব',
                'slug' => 'কম্পিউটার-ক্লাব',
            ],

            [
                'title' => 'সোশ্যাল সার্ভিস ক্লাব ',
                'slug' => 'সোশ্যাল-সার্ভিস-ক্লাব ',
            ],

           
            
        ];

        foreach($data as $data)
        {
           Organization::forceCreate($data);
        }

 	}


}

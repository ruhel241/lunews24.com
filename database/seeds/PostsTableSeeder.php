<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
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
                'title' => 'ডিজিটাল উদ্ভাবনী মেলায় লিডিং ইউনিভার্সিটির কৃতিত্ব...',
                'description' => 'সিলেটের প্রথম বেসরকারি বিশ্ববিদ্যালয় লিডিং ইউনিভার্সিটির জার্নাল অব বিজনেস সোসাইটি এন্ড সাইন্স এর ৪ নং ভলিউমের মোড়ক উন্মোচন করা হয়েছে।',
                'post_thumbnail' => 'http://facebook.com',
                'status' => 'Approve',
                'user_id' => '1',
                'category_id' => '1',
                'organization_id' => '1',
                'department_id' => '1',
                'hits' => '1',
            ],

             [
                'title' => 'ডিজিটাল উদ্ভাবনী মেলায় লিডিং ইউনিভার্সিটির কৃতিত্ব...',
                'description' => 'সিলেটের প্রথম বেসরকারি বিশ্ববিদ্যালয় লিডিং ইউনিভার্সিটির জার্নাল অব বিজনেস সোসাইটি এন্ড সাইন্স এর ৪ নং ভলিউমের মোড়ক উন্মোচন করা হয়েছে।',
                'post_thumbnail' => 'http://facebook.com',
                'status' => 'Approve',
                'user_id' => '1',
                'category_id' => '1',
                'organization_id' => '1',
                'department_id' => '1',
                'hits' => '1',
            ]
            
		 ];

        foreach($data as $data)
        {
           Post::forceCreate($data);
        }
    }



}


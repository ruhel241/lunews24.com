<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
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
                'first_name' => 'MD.Ruhel',
                'last_name'  => 'Khan',
                'mobile' 	 => '01676298288',
                'dept' 	     => 'CSE',
                'batch'      => '29',
                'gender' 	 => 'Male',
                'role' 		 =>	'admin',
                'status'     => '1',
                'email' 	 => 'ruhel241@gmail.com',
                'password'   => '$2y$10$1MYHLVV6q.BJNRO5QNvfBOS8cXuDVEakJebP4BL4qS3AO09/ZrQd.',
                
               
            ],

            [
                'first_name' => 'MD.Suhel',
                'last_name'  => 'Khan',
                'mobile' 	 => '0171545555',
                'dept' 	     => 'CSE',
                'batch'      => '29',
                'gender' 	 => 'Male',
                'role' 		 =>	'sub-admin',
                'status'     => '1',
                'email' 	 => 'suhel@gmail.com',
                'password'   => '$2y$10$1MYHLVV6q.BJNRO5QNvfBOS8cXuDVEakJebP4BL4qS3AO09/ZrQd.',
               
                
            ],

            [
                'first_name' => 'MD.Saj',
                'last_name'  => 'Khan',
                'mobile' 	 => '0155527455',
                'dept' 	     => 'CSE',
                'batch'      => '29',
                'gender' 	 => 'Male',
                'role' 		 =>	'author',
                'status'     => '1',
                'email' 	 => 'saj@gmail.com',
                'password'   => '$2y$10$1MYHLVV6q.BJNRO5QNvfBOS8cXuDVEakJebP4BL4qS3AO09/ZrQd.',
            ],

            [
                'first_name' => 'Eva',
                'last_name'  => 'Begum',
                'mobile'     => '0155527455',
                'dept'       => 'CSE',
                'batch'      => '29',
                'gender'     => 'Female',
                'role'       => 'author',
                'status'     => '1',
                'email'      => 'eva@gmail.com',
                'password'   => '$2y$10$1MYHLVV6q.BJNRO5QNvfBOS8cXuDVEakJebP4BL4qS3AO09/ZrQd.',
            ],
            
        ];

        foreach($data as $data)
        {
           User::forceCreate($data);
        }
    }



}

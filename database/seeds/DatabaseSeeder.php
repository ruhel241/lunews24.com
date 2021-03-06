<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(OrganizationsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(AdvertisementTableSeeder::class);
        $this->call(GalleriesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        
    }
}

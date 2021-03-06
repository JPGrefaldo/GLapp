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
         $this->call(FeesTableSeeder::class);
         $this->call(ClientTableSeeder::class);
         $this->call(CounselTableSeeder::class);
    }
}

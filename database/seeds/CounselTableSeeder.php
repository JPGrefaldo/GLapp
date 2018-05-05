<?php

use Illuminate\Database\Seeder;

class CounselTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\ContactInfo::class, 30)->create();
    }
}

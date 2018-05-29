<?php

use Illuminate\Database\Seeder;
use App\Fee;

class FeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $lists = array(
            'Acceptance Fee',
            'Acceptance Fee / Initial Fee',
            'Acceptance Fee / Full',
            'Acceptance Fee / Arrangement',
            'Notary'
        );
        foreach ($lists as $list) {
            $string = strtolower($list); // Replaces all spaces with hyphens.
            $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
            $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
            $string = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.

            $count = Fee::count();
            $count += 1;

            $data = new Fee();
            $data->name = $string;
            $data->display_name = $list;
            $data->description =  $faker->text($maxNbChars = 200);
            $data->code = str_pad($count, 3, '0', STR_PAD_LEFT);
            $data->save();
        }
    }
}

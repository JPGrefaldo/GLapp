<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = factory(App\Client::class, 5)->create();

        $client->each(function ($client) {
            factory('App\Business', 10)->create(['client_id' => $client->id]);
        });

    }
}

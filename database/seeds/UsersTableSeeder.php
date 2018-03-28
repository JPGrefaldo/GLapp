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

        $userList = array(
            array('Jasper Garcera', 'jasper.pacificblue@gmail.com', 'repsaj')
        );

        foreach($userList as $data){
            $user = new User();
            $user->name = $data[0];
            $user->email = $data[1];
            $user->password = bcrypt($data[2]);
            $user->save();
        }

    }
}
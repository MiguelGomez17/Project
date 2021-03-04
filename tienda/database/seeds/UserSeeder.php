<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name='Miguel Angel';
        $user->email='miguelgomez@gmail.com';
        $user->password='123456789';
        $user->type='admin';
        $user->save();
        $user2 = new User();
        $user2->name='Jose Antonio';
        $user2->email='josesito@gmail.com';
        $user2->password='13579';
        $user2->type='user';
        $user2->save();
    }
}

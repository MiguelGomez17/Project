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
        $user->password='$2y$10$nEuFa.Xf4CpoA.AhdMOCwuhgqrQ8qsnxA3lNWZZjIGwVYdUMxvf66';
        //Contraseña: 101722
        $user->type='admin';
        $user->save();
        $user2 = new User();
        $user2->name='Jose Antonio';
        $user2->email='josesito@gmail.com';
        $user2->password='$2y$10$nEuFa.Xf4CpoA.AhdMOCwuhgqrQ8qsnxA3lNWZZjIGwVYdUMxvf66';
        //Contraseña: 101722
        $user2->type='user';
        $user2->save();
        $user3 = new User();
        $user3->name='Marcos Gonzalez';
        $user3->email='margon@gmail.com';
        $user3->password='$2y$10$nEuFa.Xf4CpoA.AhdMOCwuhgqrQ8qsnxA3lNWZZjIGwVYdUMxvf66';
        //Contraseña: 101722
        $user3->type='user';
        $user3->save();
    }
}

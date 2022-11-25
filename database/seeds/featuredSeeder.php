<?php

use Illuminate\Database\Seeder;
use App\featured;

class featuredSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $featured = new featured();
        $featured->Menu = 'Ofertas';
        $featured->Productos = '';
        $featured->save();

        $featured = new featured();
        $featured->Menu = 'Vendidos';
        $featured->Productos = '';
        $featured->save();

        $featured = new featured();
        $featured->Menu = 'Nuevos';
        $featured->Productos = '';
        $featured->save();
    }
}

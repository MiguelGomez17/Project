<?php

use Illuminate\Database\Seeder;
use App\mainPage;

class mainPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mainPage = new mainPage();
        $mainPage->file='';
        $mainPage->save();
    }
}

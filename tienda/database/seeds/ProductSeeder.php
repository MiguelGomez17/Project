<?php

use Illuminate\Database\Seeder;
use App\product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new product();
        $product->description='AUDIFONOS CHICH ALAMBR CJA NEGRA HIFI';
        $product->price='47';
        $product->brand='ACA01';
        $product->image='images/sample/productSample.png';
        $product->inventory='10';
        $product->category='000';
        $product->save();
        $product2 = new product();
        $product2->description='BOCINA ALEXA AMAZON ECHO DOT 4a GENER.';
        $product2->price='1248';
        $product2->brand='BAL4G';
        $product2->image='images/sample/productSample.png';
        $product2->inventory='7';
        $product2->category='000';
        $product2->save();
        $product3 = new product();
        $product3->description='ADAPTADOR C720 ACTECK DE TIPO C A HDMI';
        $product3->price='286';
        $product3->brand='ADTCHDMI';
        $product3->image='images/sample/productSample.png';
        $product3->inventory='0';
        $product3->category='000';
        $product3->save();
    }
}

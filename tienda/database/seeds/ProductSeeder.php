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
        $product->description='Telefono movil M4B3, Memoria RAM: 1GB, Almacenmiento: 8GB';
        $product->price='1500';
        $product->brand='M4';
        $product->image='https://http2.mlstatic.com/D_NQ_NP_855489-MLM31984518233_082019-O.jpg';
        $product->inventory='10';
        $product->category='Celular';
        $product->save();
        $product2 = new product();
        $product2->description='Laptop Lenovo, Procesador: Intel Pentium 1.6Ghz, Memoria RAM: 8GB, Disco duro: 1TB';
        $product2->price='4000';
        $product2->brand='Lenovo';
        $product2->image='https://intercompras.com/images/product/LENOVO_80SL001LLM.jpg';
        $product2->inventory='10';
        $product2->category='Computadora';
        $product2->save();
        $product3 = new product();
        $product3->description='Nintendo color gris. Pila: 1 Polimero de litio necesarias e incluidas';
        $product3->price='7899.00';
        $product3->brand='Nintendo';
        $product3->image='https://images-na.ssl-images-amazon.com/images/I/61i421VnFYL._AC_SL1201_.jpg';
        $product3->inventory='10';
        $product3->category='Consola';
        $product3->save();
    }
}

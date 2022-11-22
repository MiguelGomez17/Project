<?php

use Illuminate\Database\Seeder;
use App\categories;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new categories();
        $category->categoria = '100';
        $category->subcategoria = '';
        $category->titulo = 'COMPUTACIÓN';
        $category->image = 'images/category/categorySample.png';
        $category->save();

        $category = new categories();
        $category->categoria = '200';
        $category->subcategoria = '';
        $category->titulo = 'HARDWARE';
        $category->image = 'images/category/categorySample.png';
        $category->save();

        $category = new categories();
        $category->categoria = '300';
        $category->subcategoria = '';
        $category->titulo = 'ACCESORIOS DE COMPUTO';
        $category->image = 'images/category/categorySample.png';
        $category->save();

        $category = new categories();
        $category->categoria = '400';
        $category->subcategoria = '';
        $category->titulo = 'ACCESORIOS DIVERSOS';
        $category->image = 'images/category/categorySample.png';
        $category->save();

        $category = new categories();
        $category->categoria = '500';
        $category->subcategoria = '';
        $category->titulo = 'ELECTRÓNICA Y GADGETS';
        $category->image = 'images/category/categorySample.png';
        $category->save();

        $category = new categories();
        $category->categoria = '600';
        $category->subcategoria = '';
        $category->titulo = 'GAMING';
        $category->image = 'images/category/categorySample.png';
        $category->save();

        $category = new categories();
        $category->categoria = '700';
        $category->subcategoria = '';
        $category->titulo = 'CABLES Y ADAPTADORES';
        $category->image = 'images/category/categorySample.png';
        $category->save();

        $category = new categories();
        $category->categoria = '800';
        $category->subcategoria = '';
        $category->titulo = 'CONSUMIBLES';
        $category->image = 'images/category/categorySample.png';
        $category->save();

        $category = new categories();
        $category->categoria = '900';
        $category->subcategoria = '';
        $category->titulo = 'ILUMINACION LED';
        $category->image = 'images/category/categorySample.png';
        $category->save();

        $category = new categories();
        $category->categoria = '1000';
        $category->subcategoria = '';
        $category->titulo = 'REFACCIONES';
        $category->image = 'images/category/categorySample.png';
        $category->save();

        $category = new categories();
        $category->categoria = '1100';
        $category->subcategoria = '';
        $category->titulo = 'LIMPIEZA Y MANTENIMIENTO';
        $category->image = 'images/category/categorySample.png';
        $category->save();

        $category = new categories();
        $category->categoria = '1200';
        $category->subcategoria = '';
        $category->titulo = 'SOFTWARE';
        $category->image = 'images/category/categorySample.png';
        $category->save();

        $category = new categories();
        $category->categoria = '1300';
        $category->subcategoria = '';
        $category->titulo = 'SALUD';
        $category->image = 'images/category/categorySample.png';
        $category->save();

        $category = new categories();
        $category->categoria = '000';
        $category->subcategoria = '';
        $category->titulo = 'Sin Categoria';
        $category->image = 'images/category/categorySample.png';
        $category->save();
    }
}

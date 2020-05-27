<?php

use App\Postre;
use Illuminate\Database\Seeder;

class PostresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Postre::create([
            'nombre' => 'Pan de plátano',
            'descripcion' => 'Pan casero de plátano con nuez',
            'precio' => '180.00',
            'imagen' => 'pan_platano.jpg'
        ]);

        Postre::create([
            'nombre' => 'Pay frío de Oreo',
            'descripcion' => 'Costra sabor galleta Oreo. Pay con queso crema combinado con trocitos de galleta Oreo',
            'precio' => '250.00',
            'imagen' => 'pay_frio_oreo.jpg'
        ]);

        Postre::create([
            'nombre' => 'Rosca de verduras',
            'descripcion' => 'Rica rosca de verdura compuesta por jícama, zanahoria y pepino. Acompañada de
            cacahuates y gomitas. Bañada en chamoy, chile en polvo y limón',
            'precio' => '200.00',
            'imagen' => 'rosca_verduras.jpg'
        ]);
    }
}

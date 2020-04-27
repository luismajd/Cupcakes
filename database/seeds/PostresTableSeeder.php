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
            'descripcion' => 'Pay frío y cremoso de delciosas galletas Oreo',
            'precio' => '250.00',
            'imagen' => 'pay_frio_oreo.jpg'
        ]);
    }
}

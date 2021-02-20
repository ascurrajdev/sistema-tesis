<?php

namespace Database\Seeders;

use App\Models\ProveedorLogin;
use App\Models\Servicio;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Role::factory()->count(2)->state(new Sequence(
        //     ['nombre' => 'contador'],
        //     ['nombre' => 'administrador']
        // ))->create();
        // Servicio::create([
        //     'titulo' => 'Hospedaje por persona (plan unico)',
        //     'descripcion' => 'Hospedaje',
        //     'precio' => 130000
        // ]);
        ProveedorLogin::factory(2)->state(new Sequence(
            array("nombre"=>"Facebook"),
            array("nombre"=>"Google")
        ))->create();
    }
}

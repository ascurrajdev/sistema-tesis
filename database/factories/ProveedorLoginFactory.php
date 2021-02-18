<?php

namespace Database\Factories;

use App\Models\ProveedorLogin;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorLoginFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProveedorLogin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => 'Facebook'
        ];
    }
}

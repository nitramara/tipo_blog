<?php

namespace Database\Factories;

use App\Models\Registro;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegistroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Registro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'fechaCreacionFichero' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'tipo_id_receptor' => 'Word',
            'num_id_receptor' => $this->faker->randomNumber(9),
            'forma_de_pago' => $this->faker->randomNumber(2),
            'codigo_banc_receptor' => $this->faker->randomNumber(2),
            'oficina_cta_recepbbva' => 'Word',
            'Numero_cta_repbbva' => $this->faker->randomNumber(9),
            'cta_recp_nachan' => $this->faker->randomNumber(9),
            'Num_cuenta_nachan' => $this->faker->randomNumber(9),
            'valor_ope_part_entera' => $this->faker->randomNumber(9),
            'valor_ope_decimal' => $this->faker->randomNumber(9),
            'fecha_proceso' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'fecha_lim_pago' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'fecha_cobro' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'cod_ofc_pagadora' => $this->faker->randomNumber(2),
            'hora_cobro' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'nombre_receptor' => 'Word',
            'detalle_devol' => 'Word',
            'Concepto1' => 'Word',
            'Codigo_cajero' => $this->faker->randomNumber(2),
            'status' => $this->faker->boolean(),
/*             'user_id' => User::factory(),
            'fechaCreacionFichero' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'tipo_id_receptor' => $this->faker->randomHtml(2,3),
            'num_id_receptor' => $this->faker->randomNumber(10),
            'forma_de_pago' => $this->faker->randomHtml(2,3),
            'codigo_banc_receptor' => $this->faker->randomNumber(2),
            'oficina_cta_recepbbva' => $this->faker->randomNumber(2),
            'Numero_cta_repbbva' => $this->faker->randomNumber(10),
            'cta_recp_nachan' => $this->faker->randomNumber(10),
            'Num_cuenta_nachan' => $this->faker->randomNumber(10),
            'valor_ope_part_entera' => $this->faker->randomNumber(10),
            'valor_ope_decimal' => $this->faker->randomNumber(10),
            'fecha_proceso' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'fecha_lim_pago' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'fecha_cobro' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'cod_ofc_pagadora' => $this->faker->randomNumber(2),
            'hora_cobro' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'nombre_receptor' => $this->faker->randomHtml(2,3),
            'detalle_devol' => $this->faker->randomHtml(2,3),
            'Concepto1' => $this->faker->randomHtml(2,3),
            'Codigo_cajero' => $this->faker->randomNumber(2), */


        ];
    }
}


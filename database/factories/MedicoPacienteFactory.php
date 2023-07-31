<?php

namespace Database\Factories;

use App\Models\MedicoPaciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicoPaciente>
 */
class MedicoPacienteFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MedicoPaciente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'medico_id' => random_int(1, 20),
            'paciente_id' => random_int(1, 20),
        ];
    }
}

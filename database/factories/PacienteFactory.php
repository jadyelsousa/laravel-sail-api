<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paciente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'cpf' => $this->faker->regexify('/\d{3}\.\d{3}\.\d{3}-\d{2}/'),
            'celular' => $this->generateFakePhoneNumber(),
        ];
    }

    private function generateFakePhoneNumber()
    {
        $areaCode = $this->faker->numberBetween(11, 99); // Generate a random area code between 11 and 99
        $firstPart = $this->faker->randomNumber(4); // Generate a random 4-digit number
        $secondPart = $this->faker->randomNumber(4); // Generate another random 4-digit number

        return "{$areaCode}{$firstPart}{$secondPart}";
    }
}

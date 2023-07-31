<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Medico;
use App\Models\MedicoPaciente;
use App\Models\Paciente;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(CidadeSeeder::class);
        Medico::factory(20)->create();
        Paciente::factory(20)->create();
        MedicoPaciente::factory(50)->create();
    }
}

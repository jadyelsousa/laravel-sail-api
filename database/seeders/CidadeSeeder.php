<?php

namespace Database\Seeders;

use App\Models\Cidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $capitais = [
            ['nome' => 'Rio Branco', 'estado' => 'Acre'],
            ['nome' => 'Maceió', 'estado' => 'Alagoas'],
            ['nome' => 'Macapá', 'estado' => 'Amapá'],
            ['nome' => 'Manaus', 'estado' => 'Amazonas'],
            ['nome' => 'Salvador', 'estado' => 'Bahia'],
            ['nome' => 'Fortaleza', 'estado' => 'Ceará'],
            ['nome' => 'Brasília', 'estado' => 'Distrito Federal'],
            ['nome' => 'Vitória', 'estado' => 'Espírito Santo'],
            ['nome' => 'Goiânia', 'estado' => 'Goiás'],
            ['nome' => 'São Luís', 'estado' => 'Maranhão'],
            ['nome' => 'Cuiabá', 'estado' => 'Mato Grosso'],
            ['nome' => 'Campo Grande', 'estado' => 'Mato Grosso do Sul'],
            ['nome' => 'Belo Horizonte', 'estado' => 'Minas Gerais'],
            ['nome' => 'Belém', 'estado' => 'Pará'],
            ['nome' => 'João Pessoa', 'estado' => 'Paraíba'],
            ['nome' => 'Curitiba', 'estado' => 'Paraná'],
            ['nome' => 'Recife', 'estado' => 'Pernambuco'],
            ['nome' => 'Teresina', 'estado' => 'Piauí'],
            ['nome' => 'Rio de Janeiro', 'estado' => 'Rio de Janeiro'],
            ['nome' => 'Natal', 'estado' => 'Rio Grande do Norte'],
            ['nome' => 'Porto Alegre', 'estado' => 'Rio Grande do Sul'],
            ['nome' => 'Porto Velho', 'estado' => 'Rondônia'],
            ['nome' => 'Boa Vista', 'estado' => 'Roraima'],
            ['nome' => 'Florianópolis', 'estado' => 'Santa Catarina'],
            ['nome' => 'São Paulo', 'estado' => 'São Paulo'],
            ['nome' => 'Aracaju', 'estado' => 'Sergipe'],
            ['nome' => 'Palmas', 'estado' => 'Tocantins'],
        ];

        Cidade::insert($capitais);
    }
}

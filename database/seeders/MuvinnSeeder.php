<?php

namespace Database\Seeders;

use App\Models\Muvinn;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MuvinnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            $muvinn = [
                'estado' => $faker->randomElement(['AC', 'AL', 'AP', 'AM','BA', 'CE', 'DF', 'ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO']),
                'cidade' => $faker->city,
                'endereco' => $faker->streetAddress,
                'tipos_imoveis' => $faker->randomElement(['Apartamento', 'Casa', 'Condomínio', 'Kitnet']),
                'preco' => $faker->numberBetween(100000, 1000000),
                'banheiros' => $faker->numberBetween(1, 5),
                'quartos' => $faker->numberBetween(1, 6),
                'vagas' => $faker->numberBetween(1, 4),
                'area_do_imovel' => $faker->numberBetween(50, 500),
            ];

            Muvinn::create($muvinn);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\RumahSakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            RumahSakit::create([
                'nama' => $faker->company,
                'alamat' => $faker->address,
                'email' => $faker->unique()->safeEmail,
                'telepon' => $faker->numerify('08##########'),
            ]);
        }
    }
    }
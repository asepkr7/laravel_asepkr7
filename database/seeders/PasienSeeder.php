<?php

namespace Database\Seeders;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $rumahSakitIds = RumahSakit::pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            Pasien::create([
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'telepon' => $faker->numerify('08##########'),
                'rumah_sakit_id' => $faker->randomElement($rumahSakitIds),
            ]);
        }
    }
    }
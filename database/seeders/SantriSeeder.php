<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class SantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $data = [];

        for ($i = 0; $i < 20; $i++) {
            $jenis_kelamin = $faker->randomElement(['L', 'P']);
            $jenjang = $faker->randomElement(['Aliyah', 'Tsanawiyah']);
            $kamar = 'DF' . str_pad($faker->numberBetween(1, 99), 2, '0', STR_PAD_LEFT);
            $status = $faker->randomElement(['aktif', 'tidak aktif']);

            $data[] = [
                'id_santri' => Str::random(6),
                'nama' => $faker->name($jenis_kelamin == 'L' ? 'male' : 'female'),
                'image' => null, // You can also specify a default image path if needed
                'nik' => $faker->nik(),
                'jenis_kelamin' => $jenis_kelamin,
                'kamar' => $kamar,
                'jenjang' => $jenjang,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date('Y-m-d', '2007-12-31'),
                'alamat' => $faker->address,
                'provinsi' => $faker->state,
                'kabupaten' => $faker->city,
                'nama_ayah' => $faker->firstNameMale . ' ' . $faker->lastName,
                'nama_ibu' => $faker->firstNameFemale . ' ' . $faker->lastName,
                'nomer_telp_orangtua' => $faker->phoneNumber,
                'no_kk' => $faker->nik(),
                'status' => $status,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('santris')->insert($data);
    }
}

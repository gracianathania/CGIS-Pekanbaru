<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlinikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = base_path('data_klinik.json');

        // Membaca file JSON
        $jsonData = json_decode(file_get_contents($filePath), true);

        // Masukkan data ke database
        foreach ($jsonData as $data) {
            DB::table('klinik')->insert([
                'data' => json_encode($data), // Simpan sebagai JSON
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}

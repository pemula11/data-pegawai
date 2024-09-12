<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Pegawai;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        
        $data = [
            ["nama" => "Budi", "alamat" => "Jl. Jendral Sudirman", "jenis_kelamin" => 0, "id_golongan" => 1],
            ["nama" => "Andi", "alamat" => "Jl. Kemayoran", "jenis_kelamin" => 0, "id_golongan" => 2],
            ["nama" => "Caca", "alamat" => "Jl. Walisongo", "jenis_kelamin" => 1, "id_golongan" => 1],
            ["nama" => "Desi", "alamat" => "Jl. Ahmad", "jenis_kelamin" => 1, "id_golongan" => 3],
        ];

        foreach ($data as $value) {
            Pegawai::insert([
                'nama' => $value['nama'],
                'alamat' => $value['alamat'],
                'jenis_kelamin' => $value['jenis_kelamin'],
                'tanggal_lahir' => '2000-01-01',
                'id_golongan' => $value['id_golongan'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

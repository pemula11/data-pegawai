<?php

namespace Database\Seeders;

use App\Models\Golongan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
        

        $data =  [
          ["nama_golongan" => "Juru Muda", "gaji_pokok" => 2000000, "tunjangan_jabatan" => 0], 
          ["nama_golongan" => "Juru Muda Tingkat I", "gaji_pokok" => 2200000, "tunjangan_jabatan" => 0], 
          ["nama_golongan" => "Juru", "gaji_pokok" => 2200000, "tunjangan_jabatan" => 200000],  
          ["nama_golongan" => "Juru Tingkat I", "gaji_pokok" => 2300000, "tunjangan_jabatan" => 250000],  
        ];

        foreach ($data as  $value) {
            # code...
            Golongan::insert([
                'nama_golongan' => $value['nama_golongan'],
                'gaji_pokok' => $value['gaji_pokok'],
                'tunjangan_jabatan' => $value['tunjangan_jabatan'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        }
    }
}

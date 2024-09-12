<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Golongan extends Model
{
    use HasFactory;
    protected $table = 'golongan';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
    ];

    protected $fillable = [
    'nama_golongan', 'gaji_pokok', 'tunjangan_jabatan'
    ];

    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'id_golongan', 'id');
    }
}

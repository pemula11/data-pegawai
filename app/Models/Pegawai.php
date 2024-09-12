<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $fillable = [
        'nama', 'alamat', 'tanggal_lahir', 'jenis_kelamin', 'id_golongan'
        ];

    public function golongan(): BelongsTo
    {
        return $this->belongsTo(Golongan::class, 'id_golongan');
    }
    public function cuti(): HasMany
    {
        return $this->hasMany(Cuti::class, 'id_pegawai', 'id');
    }
}

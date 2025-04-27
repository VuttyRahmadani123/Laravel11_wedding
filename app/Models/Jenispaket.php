<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenispaket extends Model
{
    protected $table = 'jenispaket';
    protected $fillable = ['nama_paket','gambar','deskripsi','harga'];
     // Tambahkan relasi ke jenispaket
     public function jenispaket()
     {
         return $this->hasMany(Jenispaket::class, );
    }
}

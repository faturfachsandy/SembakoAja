<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jenis;
use App\Models\AksiBarang;

class Barang extends Model
{
    protected $fillable = ['jenis_id', 'nama_barang', 'stok'];

    public function jenis(){
    	return $this->belongsTo(Jenis::class);
    }

    public function aksibarangs(){
    	return $this->hasMany(AksiBarang::class);
    }
}

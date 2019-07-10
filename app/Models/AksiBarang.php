<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\User;

class AksiBarang extends Model
{
    protected $fillable = ['users_id', 'barang_id', 'tanggal', 'sum_stok', 'status', 'keterangan'];

    public function barang(){
    	return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function users(){
    	return $this->belongsTo(User::class, 'users_id');
    }
}

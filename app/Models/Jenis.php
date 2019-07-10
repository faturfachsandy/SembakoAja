<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class Jenis extends Model
{
	protected $fillable = ['jenis'];

    public function barangs(){
    	return $this->hasOne(Barang::class, 'id');
    }
}

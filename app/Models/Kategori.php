<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function uangMasuk()
    {
        return $this->hasMany(UangMasuk::class);
    }

    public function uangKeluar()
    {
        return $this->hasMany(UangKeluar::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = "artikel";
    protected $fillable = ['id_user', 'nama_user', 'foto_utama', 'judul', 'link', 'kategori', 'tahun', 'wilayah', 'dinas'];

    public function File()
    {
        return $this->hasMany('App\Models\File');
    }
}

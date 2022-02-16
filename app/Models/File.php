<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = "file";
    protected $fillable = ['artikel_id', 'nama_file', 'jenis_file'];
    public function Artikel()
    {
        return $this->belongsTo('App\Models\Artikel');
    }
}

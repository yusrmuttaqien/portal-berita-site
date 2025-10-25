<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id_artikel';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'judul',
        'slug',
        'kategori_id',
        'penulis_id',
        'kategori',
        'penulis',
        'foto',
        'ringkasan',
        'isi',
        'status',
        'tanggal_terbit'
    ];


    protected $casts = [
        'tanggal_terbit' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id', 'id_kategori');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'penulis_id');
    }
}

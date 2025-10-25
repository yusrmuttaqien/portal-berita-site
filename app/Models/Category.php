<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'nama_kategori',
        'slug',
        'deskripsi',
        'aktif'
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function artikels(): HasMany
    {
        return $this->hasMany(Artikel::class, 'kategori_id', 'id_kategori');
    }
}

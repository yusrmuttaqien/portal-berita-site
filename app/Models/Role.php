<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id_role';

    protected $fillable = [
        'role',
        'deskripsi'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'role_id', 'id_role');
    }
}

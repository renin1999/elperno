<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rol extends Model
{
    use HasFactory;
    protected $fillable=[
        'rol'
    ];
    /**
    * Get all of the articulos for the Tipo
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function user(): HasMany
    {
        return $this->hasMany(User::class,'id');
    }
}

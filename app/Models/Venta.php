<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'codventa',
        'cantidad',
        'valor',
        'totalventa',
        'id_articulo',
        'id_users'
    ];

/**
     * Get the marca that owns the Articulo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function articulo(): BelongsTo
    {
        return $this->belongsTo(Articulo::class, 'id_articulo');
    }
    /**
     * Get the marca that owns the Articulo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_users');
    }


}

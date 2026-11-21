<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{
    protected $fillable = [
        'categoria_id',
        'nombre',
        'integrante',
        'precio',
        'precio_etiqueta',
        'disponible',
        'imagen',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'disponible' => 'boolean',
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function pedidos(): HasMany
    {
        return $this->hasMany(Pedido::class);
    }

    public function getPrecioMostradoAttribute(): string
    {
        if ($this->precio_etiqueta) {
            return $this->precio_etiqueta;
        }

        return '$'.number_format((float) $this->precio, 2, '.', ',').' MXN';
    }
}

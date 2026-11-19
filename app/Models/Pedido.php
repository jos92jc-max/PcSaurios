<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedido extends Model
{
    public const ESTADOS = [
        'EN JPN',
        'PAGAR EMS / ADUANA',
        'EMS PAGADO / VIENE A MX',
        'YA EN TERRITORIO MX',
        'EN PROCESO DE ENTREGA',
    ];

    protected $fillable = [
        'codigo',
        'user_id',
        'producto_id',
        'cliente_nombre',
        'cliente_email',
        'cantidad',
        'estado',
        'total',
        'notas',
    ];

    protected $casts = [
        'cantidad' => 'integer',
        'total' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }
}

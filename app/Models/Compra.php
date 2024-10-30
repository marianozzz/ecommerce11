<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $table = 'compras';

    protected $fillable = [
        'user_id',
        'venta_id', // Nuevo campo para asignación masiva
        'total',
        'fecha_compra',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

}

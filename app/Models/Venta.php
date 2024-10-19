<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = ['user_id', 'total', 'fecha'];

    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Relación con los detalles de la venta
    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class);
    }
}

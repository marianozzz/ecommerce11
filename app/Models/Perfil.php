<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfiles';
    protected $fillable = [
        'user_id',
        'direccion',
        'provincia_id',
        'ciudad_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }
}

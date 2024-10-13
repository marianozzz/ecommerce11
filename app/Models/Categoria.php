<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
     // Define los campos que pueden ser asignados de manera masiva
     protected $fillable = ['nombre','descripcion'];
}

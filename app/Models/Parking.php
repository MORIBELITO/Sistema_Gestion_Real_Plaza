<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    // Define la tabla asociada al modelo (opcional, Laravel lo infiere por defecto)
    protected $table = 'parkings';

    // Define los atributos que se pueden asignar en masa
    protected $fillable = [
        'zone',
        'available',
    ];
}

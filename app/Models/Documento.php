<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    public $timestamps = false;      //Activar las funcion de guardar la fecha automaticamente
    protected $table = 'documento';
    protected $primaryKey = 'id_documento';

    protected $fillable = [
        'id_registro',
        'ruta_documento',
       
    ];
}

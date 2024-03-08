<?php

namespace App\Models\Seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VNomenclatura_correlativo extends Model
{
    use HasFactory;
    public $timestamps = true;      //Activar las funcion de guardar la fecha automaticamente
    protected $table = 'view_correlativo';
    protected $primaryKey = 'id_nomenclatura';

    protected $fillable = [
		'MAX',
        'descripcion',          
    ];

    /**
     * Relciona el modelo Visitante con el modelo Personal para transacciones con Eloquent
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nomenclatura()
    {
        return $this->belongsTo('\App\Models\Administracion\Nomenclatura', 'id_nomenclatura', 'id_nomenclatura');
    }
    
	
}

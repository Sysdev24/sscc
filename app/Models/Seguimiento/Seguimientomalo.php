<?php

namespace App\Models\Seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seguimiento extends Model
{
    use HasFactory;
    public $timestamps = true;      //Activar las funcion de guardar la fecha automaticamente
    protected $table = 'registro';
    protected $primaryKey = 'id_registro';

    protected $fillable = [
		'id_remitente',
        'id_asignado ',
        'id_tipo_correpondencia',
        'id_area_trabajo',
        'id_ente',
        'fecha',
        'id_estatus',
        'asunto',
        'anno',
        'correlativo',
        'nro_correspondencia',
    ];

    /**
     * Relciona el modelo Visitante con el modelo Personal para transacciones con Eloquent
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personal_remitente()
    {
        return $this->belongsTo('\App\Models\Administracion\Personal', 'id_personal', 'id_remitente');
    }


    /**
     * Relciona el modelo Visitante con el modelo Operadora para transacciones con Eloquent
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personal_asignado()
    {
        return $this->belongsTo('\App\Models\Administracion\Personal', 'id_personal', 'id_asignado');
    }

    /**
     * Relciona el modelo Visitante con el modelo Plan para transacciones con Eloquent
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipo_correpondencia()
    {
        return $this->belongsTo('\App\Models\Administracion\Tipo_correspondencia', 'id_tipo_correpondencia', 'id_tipo_correpondencia');
    }

    /**
     * Relciona el modelo Visitante con el modelo Estatus para transacciones con Eloquent
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estatus()
    {
        return $this->belongsTo('\App\Models\Administracion\Estatus', 'id_estatus', 'id_estatus');
    }
    

    /**
     * Relciona el modelo Visitante con el modelo Equipo para transacciones con Eloquent
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */	
	public function area_trabajo()
    {
        return $this->belongsTo('\App\Models\Administracion\Area_trabajo', 'id_area_trabajo', 'id_area_trabajo');
    }	
	

    public function firmante()
    {
        return $this->belongsTo('\App\Models\Administracion\Firmante', 'id_firmante', 'id_firmante');
    }

    public function ente()
    {
        return $this->belongsTo('\App\Models\Administracion\Ente', 'id_ente', 'id_ente');
    }
}

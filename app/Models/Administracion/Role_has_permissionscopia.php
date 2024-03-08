<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_has_permissions extends Model
{
    use HasFactory;

    protected $table = 'role_has_permissions';
    protected $primaryKey = 'id_roles_has_permissions';

    protected $fillable = [
        'id_roles',
        'id_permission',
        'id_estatus',
    ];

    /**
     * Relciona el modelo gerencia con el modelo estatus para transacciones con Eloquent
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
     public function estatus()
     {
         return $this->belongsTo('\App\Models\Administracion\Estatus', 'id_estatus', 'id_estatus');
     }

      /**
     * Relciona el modelo gerencia con el modelo estatus para transacciones con Eloquent
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roles()
    {
        return $this->belongsTo('\App\Models\Administracion\roles', 'id_roles', 'id_roles');
    }

       /**
     * Relciona el modelo gerencia con el modelo estatus para transacciones con Eloquent
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permission()
    {
        return $this->belongsTo('\App\Models\Administracion\permission', 'id_permission', 'id_permission');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FURWEB_DIARIO_154 extends Model
{
    protected $table = 'FURWEB_DIARIO_154';
    protected  $primaryKey = 'FOLIO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'N_PERIODO', 
	    'CVE_PROGRAMA',
	    'MES',
	    'FOLIO',
      'FOLIO_RELACIONADO',
      'PROCESO_ID',
      'ACTIVIDAD_ID',
      'TRX_ID',
      'OBS',
      'NO_VECES',
	    'FECHA_REG',
	    'USU',
	    'IP',
	    'FECHA_M',
	    'USU_M',
	    'IP_M'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FURWEB_FINANZAS_154 extends Model
{
    protected $table = 'FURWEB_FINANZAS_154';
    protected  $primaryKey = 'FOLIO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'N_PERIODO', 
	    'CVE_PROGRAMA', 
	    'FOLIO',
      	'FOLIO_RELACIONADO',
	    'TARJETA',
	    'ID_TARJETA',
	    'ID_TARJETA_NUEVA',
	    'CUENTA',
      	'CLIENTE',
      	'TIPO_TARJETA',
	    'RECIBO',
	    'CVE_BANCO',
	    'FECHA_REG',
	    'USU',
	    'PW',
	    'IP',
	    'FECHA_M',
	    'USU_M',
	    'PW_M',
	    'IP_M'
    ];
}

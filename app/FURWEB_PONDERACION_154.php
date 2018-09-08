<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FURWEB_PONDERACION_154 extends Model
{
    protected $table = 'FURWEB_PONDERACION_154';
    protected  $primaryKey = 'FOLIO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'N_PERIODO', 
	    'CVE_PROGRAMA',
	    'FOLIO',
      	'FOLIO_RELACIONADO',
      	'P_01',
      	'P_02',
      	'P_03',
      	'P_04',
      	'P_05',
      	'P_06',
      	'P_07',
      	'P_08',
      	'P_09',
      	'P_10',
      	'P_11',
      	'P_12',
      	'P_13',
      	'P_14',
      	'P_15',
      	'P_16',
      	'P_17',
      	'P_18',
      	'P_19',
      	'P_20',
      	'P_21',
      	'P_22',
      	'P_23',
      	'P_24',
      	'P_25',
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

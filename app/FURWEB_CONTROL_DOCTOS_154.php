<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FURWEB_CONTROL_DOCTOS_154 extends Model
{
    protected $table = 'FURWEB_CONTROL_DOCTOS_154';
    protected  $primaryKey = 'FOLIO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'N_PERIODO', 
	    'CVE_PROGRAMA',
	    'FOLIO',
      	'FOLIO_RELACIONADO',
      	'DOCTO_1',
      	'DOCTO_2',
      	'DOCTO_3',
      	'DOCTO_4',
      	'DOCTO_5',
      	'DOCTO_6',
      	'DOCTO_7',
      	'DOCTO_8',
      	'DOCTO_9',
      	'DOCTO_10',
      	'REVISO',
      	'AUTORIZO',
      	'SUPERVISO',
      	'OBS_1',
      	'OBS_2',
	    'FECHA_REG',
	    'USU',
	    'PW',
	    'IP',
	    'FECHA_M',
	    'USU_M',
	    'PW_M'
	    'IP_M'
    ];
}

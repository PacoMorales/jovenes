<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FURWEB_CTRL_ACCESO_154 extends Model
{
    protected $table = 'FURWEB_CTRL_ACCESO_154';
    protected  $primaryKey = 'FOLIO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'N_PERIODO', 
	    'CVE_PROGRAMA', 
	    'FOLIO',
      'FOLIO_RELACIONADO',
	    'CVE_DEPENDENCIA',
	    'LOGIN',
	    'PASSWORD',
	    'TIPO_USUARIO',
      'STATUS_1',
      'STATUS_2',
	    'FECHA_REGISTRO',
      'IP'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class APARTA_FOLIO_154 extends Model
{
    protected $table = 'FURWEB_APARTA_FOLIO_154';
    protected  $primaryKey = 'FOLIO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'FOLIO', 
	    'CVE_PROGRAMA',
	    'FECHA_REG'
    ];
}

<?php
/*
Clase modelo: CAT_PARENTESCO
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_PARENTESCO extends Model
{
    protected $table = "CAT_PARENTESCO";
    protected  $primaryKey = 'CVE_PARENTESCO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_PARENTESCO', 
	    'DESC_PARENTESCO'
    ];
}

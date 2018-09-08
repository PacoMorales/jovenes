<?php
/*
Clase modelo: CAT_NACIONALIDADES
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_NACIONALIDADES extends Model
{
    protected $table = "CAT_NACIONALIDADES";
    protected  $primaryKey = 'CVE_NACIONALIDAD';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_NACIONALIDAD', 
	    'DESC_NACIONALIDAD'
    ];
}

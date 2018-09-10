<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_ACTIVIDAD_LABORAL extends Model
{
    protected $table = "CAT_ACTIVIDAD_LABORAL";
    protected  $primaryKey = 'CVE_ACTIVIDAD_LABORAL';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_ACTIVIDAD_LABORAL', 
	    'ACTIVIDAD_LABORAL'
    ];
}

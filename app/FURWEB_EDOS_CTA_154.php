<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FURWEB_EDOS_CTA_154 extends Model
{
    protected $table = 'FURWEB_EDOS_CTA_154';
    protected  $primaryKey = 'FOLIO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'N_PERIODO', 
	    'CVE_PROGRAMA', 
	    'FOLIO',
      	'FOLIO_RELACIONADO',
	    'CARGO_M01',
	    'ABONO_M01',
	    'CARGO_M02',
	    'ABONO_M02',
	    'CARGO_M03',
	    'ABONO_M03',
	    'CARGO_M04',
	    'ABONO_M04',
	    'CARGO_M05',
	    'ABONO_M05',
	    'CARGO_M06',
	    'ABONO_M06',
	    'CARGO_M07',
	    'ABONO_M07',
	    'CARGO_M08',
	    'ABONO_M08',
	    'CARGO_M09',
	    'ABONO_M09',
	    'CARGO_M10',
	    'ABONO_M10',
	    'CARGO_M11',
	    'ABONO_M11',
	    'CARGO_M12',
	    'ABONO_M12',
	    'CARGO_C01',
	    'ABONO_C01',
	    'CARGO_C02',
	    'ABONO_C02',
	    'CARGO_C03',
	    'ABONO_C03',
	    'CARGO_C04',
	    'ABONO_C04',
	    'CARGO_C05',
	    'ABONO_C05',
	    'CARGO_C06',
	    'ABONO_C06',
	    'CARGO_C07',
	    'ABONO_C07',
	    'CARGO_C08',
	    'ABONO_C08',
	    'CARGO_C09',
	    'ABONO_C09',
	    'CARGO_C10',
	    'ABONO_C10',
	    'CARGO_C11',
	    'ABONO_C11',
	    'CARGO_C12',
	    'ABONO_C12',
	    'STATUS_1',
	    'STATUS_2',
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

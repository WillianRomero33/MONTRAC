<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportStatus extends Model
{
    use HasFactory;
    protected $fillable = ['id_transport','id_origindetail',
        'estado',
        'selectivo',
        'inicio_transito',
        'ingreso_zf',
        'fin_transito',
        'inicio_selectivo',
        'fin_selectivo',
        'fin_revision',
        'descarga',
    ];

    public function transports(){
        return $this->belongsTo(Transport::class, 'id_transport');
    }

    public function origins(){
        return $this->belongsTo(OriginDetail::class, 'id_origindetail');
    }
    
}

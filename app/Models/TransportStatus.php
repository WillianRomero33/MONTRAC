<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportStatus extends Model
{
    use HasFactory;
    protected $fillable = ['id_transport','id_origindetail',
        'inicio_transito',
        'fin_transito',
        'inicio_selectivo',
        'fin_selectivo',
        'fin_revision',
        'descarga',
    ];

    public function transport(){
        return $this->belongsTo(Transport::class);
    }

    public function OriginDetail(){
        return $this->belongsTo(OriginDetail::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OriginDetail extends Model
{
    use HasFactory;
    protected $fillable = ['id_pais', 'id_empresa'];

    public function countries(){
        return $this->belongsTo(Country::class, 'id_pais');
    }

    public function companies(){
        return $this->belongsTo(Company::class, 'id_empresa');
    }
    
    public function transports(){
        return $this->hasMany(Transport::class, 'id_transport');
    }
}

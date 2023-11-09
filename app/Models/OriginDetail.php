<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OriginDetail extends Model
{
    use HasFactory;
    protected $fillable = ['id_pais', 'id_empresa'];

    public function country(){
        return $this->hasMany(Country::class, 'id_pais');
    }

    public function company(){
        return $this->hasMany(Company::class, 'id_empresa');
    }
    public function transport(){
        return $this->hasMany(Transport::class, 'id_transport');
    }
}

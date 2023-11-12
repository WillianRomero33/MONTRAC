<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory; 
    protected $fillable = ['empresa'];

    public function origins(){
        return $this->hasMany(OriginDetail::class, 'id_empresa');
    }
}

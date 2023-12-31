<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['pais'];

    public function origins(){
        return $this->hasMany(OriginDetail::class, 'id_pais');
    }
}

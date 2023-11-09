<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;
    protected $fillable = ['placa', 'tipo'];

    public function originDetail(){
        return $this->belongsTo(OriginDetail::class);
    }

}

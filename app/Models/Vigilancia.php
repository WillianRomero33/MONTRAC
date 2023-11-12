<?php

// app/Models/Vigilancia.php

// app/Models/Vigilancia.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vigilancia extends Model
{
    protected $table = 'transports';

    protected $fillable = [
        // Agrega aquí los campos que pueden ser llenados masivamente si es necesario
    ];

    public function originDetail()
    {
        return $this->belongsTo(OriginDetail::class, 'id_origindetail');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'id_empresa');
    }

    public function transportStatus()
    {
        return $this->hasOne(TransportStatus::class, 'id_transport', 'id');
    }
}

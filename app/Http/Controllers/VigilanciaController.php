<?php

namespace App\Http\Controllers;

use App\Models\TransportStatus;
use App\Http\Controllers\Controller;

class VigilanciaController extends Controller
{
    public function index()
    {
        $data = TransportStatus::orderByDesc('inicio_transito')->paginate(10);
        return view('vigilancia.index', compact('data'));
    }

    public function confirmarIngreso($id)
    {
        $transport = TransportStatus::findOrFail($id);

        // Verificar si la columna inicio_transito es NULL
        if ($transport->ingreso_zf === null) {
            // Actualizar el timestamp de inicio_transito
            $transport->ingreso_zf = now();
            $transport->estado = "En Zona Franca";
            $transport->update();

            return redirect()->route('vigilancia.index')->with('success', 'Ingreso confirmado correctamente');
        } else {
            return redirect()->route('vigilancia.index')->with('warning', 'El ingreso ya ha sido confirmado previamente');
        }
    }
}

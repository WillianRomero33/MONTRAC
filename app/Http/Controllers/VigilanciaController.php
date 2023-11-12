<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Vigilancia;
use App\Http\Controllers\Controller;

class VigilanciaController extends Controller
{
    public function index()
    {
        $data = Vigilancia::with(['originDetail.country', 'company', 'transportStatus'])
            ->get();

        return view('vigilancia.vigilancia', compact('data'));
    }

    public function confirmarIngreso($id)
    {
        $transport = Vigilancia::findOrFail($id);

        // Verificar si la columna inicio_transito es NULL
        if ($transport->transportStatus->inicio_transito === null) {
            // Actualizar el timestamp de inicio_transito
            $transport->transportStatus->inicio_transito = Carbon::now();
            $transport->transportStatus->save();

            return redirect()->route('vigilancia.index')->with('success', 'Ingreso confirmado correctamente');
        } else {
            return redirect()->route('vigilancia.index')->with('warning', 'El ingreso ya ha sido confirmado previamente');
        }
    }
}

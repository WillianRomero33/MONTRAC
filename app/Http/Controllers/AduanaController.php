<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransportStatus;
use App\Models\Transport;
use App\Models\OriginDetail;

class AduanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transports = TransportStatus::orderByDesc('inicio_transito')->where('inicio_transito','!=', null)->paginate(7);
        return view('aduana.index', compact('transports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $medios = Transport::all();
        $origins = OriginDetail::all();
        $transport = TransportStatus::find($id);
        return view('aduana.edit', compact('transport','medios','origins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $transport = TransportStatus::find($id);
        $transport->selectivo = $request->selectivo;
        switch ($transport->selectivo) {
            case 1:
                $transport->fin_selectivo = now();
                $transport->fin_revision = now();
                $transport->estado = "Listo para Descarga";
                break;
            case 2:
                $transport->fin_selectivo = now();
                $transport->fin_revision = NULL;
                $transport->estado = "En Revisión";
                break;
            case 3:
                $transport->fin_selectivo = now();
                $transport->fin_revision = NULL;
                $transport->estado = "En Revisión";
                break;
            default:
                # code...
                break;
        }
        $transport->update();
        return redirect()->route('aduanas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function transito(string $id)
    {
        //
        $transport = TransportStatus::find($id);
        $transport->fin_transito = now();
        $transport->estado = "Transito Finalizado";
        $transport->update();
        return redirect()->route('aduanas.index');
    }

    public function selectivo(string $id)
    {
        //
        $transport = TransportStatus::find($id);
        $transport->fin_revision = now();
        $transport->estado = "Listo para Descarga";
        $transport->update();
        return redirect()->route('aduanas.index');
    }
}

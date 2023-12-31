<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransportStatus;
use App\Models\Transport;
use App\Models\OriginDetail;
use Barryvdh\DomPDF\Facade\Pdf; //Import DOMPDF library

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transports = TransportStatus::orderByDesc('inicio_transito')
                        ->paginate(8);
        return view('import.index', compact('transports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $medios = Transport::all();
        $origins = OriginDetail::orderBy('id_empresa')->get();
        return view('import.create', compact('medios','origins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $transport = new TransportStatus();
        $transport->id_transport = $request->id_medio;
        $transport->id_origindetail = $request->id_origin;
        $transport->inicio_transito = now();
        $transport->estado = "En Transito";
        $transport->save();
        return redirect()->route('imports.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $medios = Transport::all();
        $origins = OriginDetail::orderBy('id_empresa')->get();
        $transport = TransportStatus::find($id);
        return view('import.edit', compact('transport','medios','origins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $transport = TransportStatus::find($id);
        $transport->id_transport = $request->id_medio;
        $transport->id_origindetail = $request->id_origin;
        $transport->update();
        return redirect()->route('imports.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $transport = TransportStatus::find($id);
        $transport->delete();
        return redirect()->route('imports.index');
    }

    public function submit(string $id)
    {
        //
        $transport = TransportStatus::find($id);
        $transport->inicio_selectivo = now();
        $transport->estado = "Espera de Selectivo";
        $transport->update(); 
        return redirect()->route('imports.index');
    }

    public function report()
    {
        //
        $transports = TransportStatus::orderByDesc('inicio_transito')->get();
        $pdf = Pdf::loadView('import.report', compact('transports'));
        $pdf->setPaper('A4','landscape');
        return $pdf->stream('archivo.pdf');
    }
}

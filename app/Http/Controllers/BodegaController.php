<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Company;
use App\Models\Transport;
use App\Models\OriginDetail;
use App\Models\TransportStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transport_status = TransportStatus::with('transports','origins')->paginate(7);
        return view('bodega.index', compact('transport_status'));
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
     * Display the specified resource.
     */
    public function show(string $id)
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
        $transports = TransportStatus::find($id);
        return view('bodega.edit', compact('transports','medios','origins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $transports = TransportStatus::find($id);
        $transports->id_transport = $request->id_medio;
        $transports->id_origindetail = $request->id_origin;
        $transports->update();
        return redirect()->route('bodega.index');
    }

    /**
     * Confirma la descarga de un medio
     */

    public function submit(string $id)
    {
        $transports = TransportStatus::find($id);
        $transports->descarga = now();
        $transports->estado = 'Descargado';
        $transports->update();
        return redirect()->route('bodega.index');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transport;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $medios = Transport::paginate(7);
        return view ('transport.index', compact('medios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('transport.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $medio = new Transport();
        $medio->placa = $request->placa;
        $medio->tipo = $request->tipo;
        $medio->save();
        return redirect()->route('transports.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $medio = Transport::find($id);
        return view('transport.edit', compact('medio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $medio = Transport::find($id);
        $medio->placa = $request->placa;
        $medio->tipo = $request->tipo;
        $medio->update();
        return redirect()->route('transports.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $medio = Transport::find($id);
        $medio->delete();
        return redirect()->route('transports.index');
    }
}

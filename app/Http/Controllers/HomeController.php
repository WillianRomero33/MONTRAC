<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\TransportStatus;
use App\Models\Transport;
use App\Models\OriginDetail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = DB::table('transport_statuses')
                        ->select('estado')
                        ->groupBy('estado')
                        ->orderBy('estado')
                        ->pluck('estado');

        $estados = DB::table('transport_statuses')
                    ->select(DB::RAW('COUNT(id) as conteo'))
                    ->groupBy('estado')
                    ->orderBy('estado')
                    ->pluck('conteo');

        $selectivos = DB::table('transport_statuses')
                    ->select('selectivo')
                    ->groupBy('selectivo')
                    ->orderBy('selectivo')
                    ->pluck('selectivo');
        
        $selectivos_text = collect();
        foreach ($selectivos as $selectivo) {
            switch ($selectivo) {
                case 0:
                    $selectivos_text->push("Sin Selectivo");
                    break;
                case 1:
                    $selectivos_text->push("Verde");
                    break;
                case 2:
                    $selectivos_text->push("Amarillo");
                    break;
                case 3:
                    $selectivos_text->push("Rojo");
                    break;
                default:
                    break;
            }
        }

        $count_selectivos = DB::table('transport_statuses')
                    ->select(DB::RAW('COUNT(id) as conteo'))
                    ->groupBy('selectivo')
                    ->orderBy('selectivo')
                    ->pluck('conteo');

        $count_empresas = DB::table('transport_statuses as ts')
                    ->select(DB::RAW('COUNT(ts.id) as conteo'))
                    ->join('origin_details as od', 'ts.id_origindetail', '=', 'od.id')
                    ->join('companies as co', 'od.id_empresa', '=', 'co.id')
                    ->groupBy('empresa')
                    ->orderBy('empresa')
                    ->pluck('conteo');
        
        $empresas = DB::table('companies')
                    ->select('empresa')
                    ->groupBy('empresa')
                    ->orderBy('empresa')
                    ->pluck('empresa');
        return view('dashboard', compact('categories', 'estados','selectivos_text','count_selectivos','count_empresas','empresas'));
    }
}

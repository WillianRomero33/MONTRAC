<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OriginDetail;
use App\Models\Company;
use App\Models\Country;

class OriginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $origins = OriginDetail::orderBy('id_empresa')->paginate(8);
        return view('origin.index', compact('origins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $companies = Company::orderBy('empresa')->get();
        $countries = Country::orderBy('pais')->get();
        return view('origin.create', compact('companies','countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Inicializamos las variables
        $origin = new OriginDetail();
        $country = Country::where('pais', $request->pais)->get();
        $company = Company::where('empresa', $request->empresa)->get();

        //Validación de Pais
        if ($country->isEmpty()) {
            //Si no existe añadimos el pais nuevo a la tabla "Countries"
            $new_country = new Country();
            $new_country->pais = $request->pais;
            $new_country->save();
            //Conseguimos el ultimo ID que seria el que acabamos de ingresar
            $idCountry = Country::orderBy('id','desc')->first();
            //Asignamos el ID del pais a la tabla Origin
            $origin->id_pais = $idCountry->id;
        }else{
            //Si existe solo asignamos el id encontrado
            $origin->id_pais = $country->first()->id;
        }

        //Validación de Empresa
        if ($company->isEmpty()) {
            //Si no existe añadimos la empresa nuevo a la tabla "Companies"
            $new_company = new Company();
            $new_company->empresa = $request->empresa;
            $new_company->save();
            //Conseguimos el ultimo ID que seria el que acabamos de ingresar
            $idCompany = Company::orderBy('id','desc')->first();
            //Asignamos el ID de la empresa a la tabla Origin
            $origin->id_empresa = $idCompany->id;
        }else{
            //Si existe solo asignamos el id encontrado
            $origin->id_empresa = $company->first()->id;
        }
        
        //Creamos el nuevo registro
        $origin->save();
        return redirect()->route('origins.index');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $origin = OriginDetail::find($id);
        $companies = Company::orderBy('empresa')->get();
        $countries = Country::orderBy('pais')->get();
        return view('origin.edit', compact('origin','companies','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $origin = OriginDetail::find($id);
        $country = Country::where('pais', $request->pais)->get();
        $company = Company::where('empresa', $request->empresa)->get();

        //Validación de Pais
        if ($country->isEmpty()) {
            //Si no existe añadimos el pais nuevo a la tabla "Countries"
            $new_country = new Country();
            $new_country->pais = $request->pais;
            $new_country->save();
            //Conseguimos el ultimo ID que seria el que acabamos de ingresar
            $idCountry = Country::orderBy('id','desc')->first();
            //Asignamos el ID del pais a la tabla Origin
            $origin->id_pais = $idCountry->id;
        }else{
            //Si existe solo asignamos el id encontrado
            $origin->id_pais = $country->first()->id;
        }
        echo " ";
        //Validación de Empresa
        if ($company->isEmpty()) {
            //Si no existe añadimos la empresa nuevo a la tabla "Companies"
            $new_company = new Company();
            $new_company->empresa = $request->empresa;
            $new_company->save();
            //Conseguimos el ultimo ID que seria el que acabamos de ingresar
            $idCompany = Company::orderBy('id','desc')->first();
            //Asignamos el ID de la empresa a la tabla Origin
            $origin->id_empresa = $idCompany->id;
        }else{
            //Si existe solo asignamos el id encontrado
            $origin->id_empresa = $company->first()->id;
        }
        //Actualizamos el nuevo registro
        $origin->update();
        return redirect()->route('origins.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $origin = OriginDetail::find($id);
        $origin->delete();
        return redirect()->route('origins.index');
    }
}

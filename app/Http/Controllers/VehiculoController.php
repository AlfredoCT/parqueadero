<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculo = App\vehiculo::orderby('id', 'asc')->get();
        $cupos = App\cupos::orderby('id', 'asc')->get();
        $clientes = App\clientes::orderby('id', 'asc')->get();

        return view('vehiculo.index', compact('vehiculo','cupos','clientes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'idcliente' => 'required',
            'idcupo' => 'required',
            'placa' => 'required',
            'tipovehiculo' => 'required',
            'horaentrada' => 'required'
        ]);

        App\vehiculo::create($request->all());    
        
        return redirect()->route('vehiculo.index')
                ->with('exito', 'Vehiculo creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = App\vehiculo::join('cupos', 'vehiculos.idcupo', 'cupos.id')
                                ->join('clientes', 'vehiculos.idcliente', 'clientes.id')
                                ->select('vehiculos.*', 'cupos.nombre as cupo',
                                        'clientes.nombre as cliente')
                                ->where('vehiculos.id', $id)
                                ->first();
        
        return view('vehiculo.view', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cupos = App\cupos::orderby('id', 'asc')->get();
        $clientes = App\clientes::orderby('id', 'asc')->get();
        $vehiculo = App\vehiculo::findorfail($id);

        return view('vehiculo.edit', compact('cupos', 'clientes', 'vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'idcliente' => 'required',
            'idcupo' => 'required',
            'placa' => 'required',
            'tipovehiculo' => 'required',
            'horaentrada' => 'required'
        ]);

        $vehiculo = App\vehiculo::findorfail($id);

        $vehiculo->update($request->all());

        return redirect()->route('vehiculo.index')
                ->with('exito', 'se modifico el vehiculo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculo = App\vehiculo::findorfail($id);

        $vehiculo->delete();

        return redirect()->route('vehiculo.index')
                ->with('exito', 'se elimino el vehiculo con exito');
    }
}

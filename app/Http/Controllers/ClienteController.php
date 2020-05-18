<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = App\clientes::orderby('id', 'asc')->get();
        return view('clientes.index', compact('clientes'));
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
            'tipodocumento' => 'required',
            'numerodocumento' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required'
        ]);

        App\clientes::create($request->all());      
        
        return redirect()->route('clientes.index')
                ->with('exito', 'Cliente creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = App\clientes::findorfail($id);

        return view('clientes.view',  compact('clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = App\clientes::findorfail($id);

        return view('clientes.edit', compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipodocumento' => 'required',
            'numerodocumento' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required'
        ]);

        $clientes = App\clientes::findorfail($id);

        $clientes->update($request->all());

        return redirect()->route('clientes.index')
                ->with('exito', 'se modifico el cliente con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = App\clientes::findorfail($id);

        $clientes->delete();

        return redirect()->route('clientes.index')
                ->with('exito', 'se elimino el cliente con exito');
    }
}

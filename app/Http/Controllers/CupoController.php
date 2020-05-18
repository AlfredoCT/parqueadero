<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class CupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cupos = App\cupos::orderby('id', 'asc')->get();
        return view('cupos.index', compact('cupos'));
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
            'nombre' => 'required',
            'estado' => 'required'
        ]);

        App\Cupos::create($request->all());      
        
        return redirect()->route('cupos.index')
                ->with('exito', 'Cupo creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cupos  $cupos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cupos = App\cupos::findorfail($id);

        return view('cupos.view',  compact('cupos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cupos  $cupos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cupos = App\cupos::findorfail($id);

        return view('cupos.edit', compact('cupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cupos  $cupos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'estado' => 'required'
        ]);

        $cupos = App\cupos::findorfail($id);

        $cupos->update($request->all());

        return redirect()->route('cupos.index')
                ->with('exito', 'se modifico el cupo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cupos  $cupos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cupos = App\cupos::findorfail($id);

        $cupos->delete();

        return redirect()->route('cupos.index')
                ->with('exito', 'se elimino el cupo con exito');
    }
}

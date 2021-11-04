<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use Illuminate\Http\Request;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Informe = Informe::all();
        return $Informe;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ALTERNATIVA
        // $requestData = $request->all();
        // Informe::insert($requestData);

        $Data = new Informe();
        $Data->titulo= $request->input('titulo');
        $Data->fecha= $request->input('fecha');
        $Data->descripcion= $request->input('descripcion');
        $Data->id_practicante= $request->input('id_practicante');
        $Data->save();
        return $request;
        // return 'Informe Guardado';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function show(Informe $informe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function edit(Informe $informe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //GUARDAMOS EN requestData lo q nos mandamos del formData
        $requestData = $request->all();
        //determinamos que fila vamos a actualizar yyy luego actualizamos los nuevos datos
        Informe::where('id_informe','=',$id)->update($requestData);
        // return 'Datos Informe Modificados';
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $deletedRows = Informe::where('id_informe','=', $id)->delete(); 
        return 'Eliminacion Correcta';
    }
}
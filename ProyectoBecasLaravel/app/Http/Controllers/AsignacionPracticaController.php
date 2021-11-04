<?php

namespace App\Http\Controllers;

use App\Models\Asignacion_practica;
use Illuminate\Http\Request;

class AsignacionPracticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asig = Asignacion_practica::all();
        return $asig;
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
        $Data = $request;
        $Data->save();
        return 'Asignacion Agregada';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignacion_practica  $asignacion_practica
     * @return \Illuminate\Http\Response
     */
    public function show(Asignacion_practica $asignacion_practica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignacion_practica  $asignacion_practica
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignacion_practica $asignacion_practica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignacion_practica  $asignacion_practica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //GUARDAMOS EN requestData lo q nos mandamos del formData
        $requestData = $request->all();
        //determinamos que fila vamos a actualizar yyy luego actualizamos los nuevos datos
        Asignacion_practica::where('id_asignacion','=',$id)->update($requestData);
        return 'Datos administrativo Modificados';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignacion_practica  $asignacion_practica
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $administrativo =Administrativo::findOrFail($id);
        Asignacion_practica::destroy($id);    
         return 'Eliminacion Correcta';
    }
}
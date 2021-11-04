<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa = Empresa::all();
        return $empresa;
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
        $Data = new Empresa();
        $Data->nombre= $request->input('nombre');
        $Data->descripcion= $request->input('descripcion');
        $Data->fecha_inicio= $request->input('fecha_inicio');
        $Data->fecha_finalizacion= $request->input('fecha_finalizacion');
        $Data->id_administrativo= $request->input('id_administrativo');
        $Data->save();
        return 'Datos Empresa Guardado';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //GUARDAMOS EN requestData lo q nos mandamos del formData
        $requestData = $request->all();
        //determinamos que fila vamos a actualizar yyy luego actualizamos los nuevos datos
        Empresa::where('id_empresa','=',$id)->update($requestData);
        return 'Datos empresa Modificados';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedRows = Empresa::where('id_empresa','=', $id)->delete(); 
        return 'Eliminacion Correcta';
    }
}
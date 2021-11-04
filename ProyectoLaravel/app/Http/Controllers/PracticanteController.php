<?php

namespace App\Http\Controllers;

use App\Models\Practicante;
use Illuminate\Http\Request;

class PracticanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $practicante = Practicante::all();
        return $practicante;
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
        $Data = new Practicante();
        $Data->ci_practicante= $request->input('ci_practicante');
        $Data->nombre= $request->input('nombre');
        $Data->apellido_paterno= $request->input('apellido_paterno');
        $Data->apellido_materno= $request->input('apellido_materno');
        $Data->carrera= $request->input('carrera');
        $Data->facultad= $request->input('facultad');
        $Data->contrasenia= $request->input('contrasenia');
        $Data->id_administrativo= $request->input('id_administrativo');
        $Data->save();
        return 'practicante Guardado';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Practicante  $practicante
     * @return \Illuminate\Http\Response
     */
    public function show(Practicante $practicante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Practicante  $practicante
     * @return \Illuminate\Http\Response
     */
    public function edit(Practicante $practicante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Practicante  $practicante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //GUARDAMOS EN requestData lo q nos mandamos del formData
        $requestData = $request->all();
        //determinamos que fila vamos a actualizar yyy luego actualizamos los nuevos datos
        Practicante::where('id_practicante','=',$id)->update($requestData);
        return 'Datos practicante Modificados';
    }
    public function ModificarPracticante(Request $request, $id) //SABEMOS Q ESTE TIENE METODO POST
    {
        //GUARDAMOS EN requestData lo q nos mandamos del formData
        $requestData = $request->all();
        //determinamos que fila vamos a actualizar yyy luego actualizamos los nuevos datos
        Practicante::where('id_practicante','=',$id)->update($requestData);
        return 'Datos practicante Modificados';
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Practicante  $practicante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Practicante::findOrFail($id)->delete();
        //Practicante::destroy($id);    
        $deletedRows = Practicante::where('id_practicante','=', $id)->delete();
         return 'Eliminacion Correcta';
        // return $PracticanteData;
    }
    public function PracticanteLogin(Request $request)
    {
        $Carnet = $request->ci1;
        $Password = $request->contrasenia1;

        // PASO 1
        $PracticanteData = Practicante::where("ci_practicante","=",$Carnet)->first();
        /*
        NOMBRE, APM APP CARGO Y SU CONTRASNIA CI
        */
        // PASO 2
        if ($PracticanteData->contrasenia == $Password) {
            //LOGUEO CORRECTO
            return $PracticanteData;
        }
        else
        {
            //NO EXISTE
            return 'NOLOG';

        }

    }
}
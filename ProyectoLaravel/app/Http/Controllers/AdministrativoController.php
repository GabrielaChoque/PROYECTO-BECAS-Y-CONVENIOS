<?php

namespace App\Http\Controllers;

use App\Models\Administrativo;
use Illuminate\Http\Request;

class AdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administrativo  $administrativo
     * @return \Illuminate\Http\Response
     */
    public function show(Administrativo $administrativo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrativo  $administrativo
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrativo $administrativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrativo  $administrativo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrativo $administrativo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrativo  $administrativo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrativo $administrativo)
    {
        //
    }
    public function AdministrativoLogin(Request $request)
    {
        $Carnet = $request->ci1;
        $Password = $request->contrasenia1;

        ///return $request;
        // // PASO 1
        $AdministrativoData = Administrativo::where("ci","=",$Carnet)->first();
        // /*
        // NOMBRE, APM APP CARGO Y SU CONTRASNIA CI
        // */
        // // PASO 2
        if ($AdministrativoData->contrasenia == $Password) {
        //     //LOGUEO CORRECTO
             return $AdministrativoData;
         }
         else
         {
        //     //NO EXISTE
             return 'NOLOG';

         }

    }
}


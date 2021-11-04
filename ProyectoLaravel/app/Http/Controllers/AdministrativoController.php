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
        // CONSULTAS ELOQUENT LARAVEL
        $admin = Administrativo::all();
        return $admin;
    }
    public function BuscarID()
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
        
        // if($request->hasFile('Foto')){
        //     $file = $request->file('Foto');
        //     $namefile = time().$file->getClientOriginalName();
        //     $file->move(public_path().'/administrativos/',$namefile);
        // }
        // $administrativo = new Administrativos();
        // if($request->hasFile('Foto')){$administrativo->Foto = 'Administrativos/'.$namefile;}
        // else{$administrativo->Foto = '';}
        // $administrativo->Ap_Paterno= $request->input('Ap_Paterno');
        // $administrativo->Ap_Materno= $request->input('Ap_Materno');
        // $administrativo->Nombre= $request->input('Nombre');
        // $administrativo->Sexo= $request->input('Sexo');
        // $administrativo->FechNac= $request->input('FechNac');
        // $administrativo->CI= $request->input('CI');
        // $administrativo->Tipo= $request->input('Tipo');
        // $administrativo->Password= $request->input('Password');
        // $administrativo->curso_id= $request->input('curso_id');
        // $administrativo->Estado= $request->input('Estado');
        // $administrativo->save();
        

        $administrativo = new Administrativos();
        $administrativo->CI= $request->input('CI');
        $administrativo->Nombre= $request->input('Nombre');
        $administrativo->Apellido_paterno= $request->input('Apellido_paterno');
        $administrativo->Apellido_materno= $request->input('Apellido_materno');
        $administrativo->Cargo= $request->input('Cargo');
        $administrativo->Contrasenia= $request->input('Contrasenia');
        $administrativo->save();
        return 'administrativo Guardado';


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administrativo  $Administrativo
     * @return \Illuminate\Http\Response
     */
    public function show(Administrativo $Administrativo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrativo  $Administrativo
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrativo $Administrativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrativo  $Administrativo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrativo $Administrativo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrativo  $Administrativo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrativo $Administrativo)
    {
        $deletedRows = Administrativo::where('id_administrativo','=', $id)->delete(); 
        return 'Eliminacion Correcta';
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

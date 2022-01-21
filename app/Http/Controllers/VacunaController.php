<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Vacuna;
use Illuminate\Http\Request;

class VacunaController extends Controller
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
        $vacuna = new Vacuna($request->all());
        $vacuna->save();
        return $vacuna;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function aplicarVacuna(Vacuna $vacuna, Mascota $mascota)
    {
        //Cuando hagamos operaciones sobre una relación utilizamos su método. 
        //En relaciones muchos a muchos utilizamos attach
        $mascota->vacunas()->attach($vacuna->id);
        $mascota->vacunas; //Accedo a las vacunas de la mascota.
        // También se puede hacer al revés
        // $vacuna->mascotas()->attach($mascota->id);
        return $mascota;
    }
}

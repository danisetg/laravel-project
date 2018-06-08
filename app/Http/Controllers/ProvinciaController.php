<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProvinciaRequest;
use App\Provincia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProvinciaController extends Controller
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
     * Display all stored elements of resource
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $provincias = Provincia::all();
        return $this->normalResponse($provincias,"Datos Recuperados");
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
     * @param ProvinciaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinciaRequest $request)
    {
        $provincia = new Provincia($request->all());
        $provincia->save();
        return $this->normalResponse($provincia, "Objeto Creado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function show(Provincia $provincia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function edit(Provincia $provincia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provincia $provincia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provincia $provincia)
    {
        //
    }
}

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
     * Show All resources stored
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showAll()
    {
        $provincias = Provincia::all();
        return $this->normalResponse($provincias,"Datos Recuperados");
    }

    /**
     * Store new resource
     *
     * @param ProvinciaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProvinciaRequest $request)
    {
        $provincia = new Provincia($request->all());
        $provincia->save();
        return $this->normalResponse($provincia, "Objeto Creado");
    }

    /**
     * Display the data of the given province
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $province = Provincia::findOrFail($id);
        return $this->normalResponse($province, 'Datos Recuperados');
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

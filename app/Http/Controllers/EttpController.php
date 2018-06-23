<?php

namespace App\Http\Controllers;

use App\Ettp;
use App\Http\Requests\EttpRequest;
use Illuminate\Http\Request;

class EttpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $response = Ettp::query();
        $response->where('nombre', 'like', '%'.$request['q'].'%')
            -> orWhere('abreviatura', 'like', '%'.$request['q'].'%');
        return $response->paginate($request['limit'],['*'],'page',$request['offset']+1);
    }

    /**
     * Show All resources stored
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showAll()
    {
        $ettps = Ettp::all();
        return $this->normalResponse($ettps,"Datos Recuperados");
    }

    /**
     * Store new resource
     *
     * @param EttpRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(EttpRequest $request)
    {
        $ettp = new Ettp($request->all());
        $ettp->save();
        return $this->normalResponse($ettp, "Objeto Creado");
    }

    /**
     * Display the data of the given ettp
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $ettp = Ettp::findOrFail($id);
        return $this->normalResponse($ettp, 'Datos Recuperados');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param EttpRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EttpRequest $request, $id)
    {
        $ettp = Ettp::findOrFail($id);
        $ettp->fill($request->all());
        $ettp->save();
        return $this->normalResponse($ettp, 'Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ettp  $ettp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ettp = Ettp::findOrFail($id);
        $ettp->delete();
        return $this->normalResponse($id, 'Ettp Eliminada');

    }
}

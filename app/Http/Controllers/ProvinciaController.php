<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProvinciaRequest;
use App\Provincia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $response = Provincia::query();
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
        $province['municipios'] = $province->municipios()->get();
        return $this->normalResponse($province, 'Datos Recuperados');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $province = Provincia::findOrFail($id);
        $province->fill($request->all());
        $province->save();
        return $this->normalResponse($province, 'Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $province = Provincia::findOrFail($id);
        $province->delete();
        return $this->normalResponse($id, 'Provincia Eliminada');

    }
}

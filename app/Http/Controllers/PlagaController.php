<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlagaRequest;
use App\Plaga;
use Illuminate\Http\Request;

class PlagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $response = Plaga::query();
        $response->where('nombre_cientifico', 'like', '%'.$request['q'].'%')
            -> orWhere('nombre_vulgar', 'like', '%'.$request['q'].'%');
        return $response->paginate($request['limit'],['*'],'page',$request['offset']+1);
    }

    /**
     * Show All resources stored
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showAll()
    {
        $plagas = Plaga::all();
        return $this->normalResponse($plagas,"Datos Recuperados");
    }

    /**
     * Store new resource
     *
     * @param PlagaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PlagaRequest $request)
    {
        $plaga = new Plaga($request->all());
        $plaga->save();
        return $this->normalResponse($plaga, "Objeto Creado");
    }

    /**
     * Display the data of the given plaga
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $plaga = Plaga::findOrFail($id);
        $plaga['plagas_cultivo'] = $plaga->plagasCultivo()->get();
        return $this->normalResponse($plaga, 'Datos Recuperados');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param PlagaRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PlagaRequest $request, $id)
    {
        $plaga = Plaga::findOrFail($id);
        $plaga->fill($request->all());
        $plaga->save();
        return $this->normalResponse($plaga, 'Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $plaga = Plaga::findOrFail($id);
        $plaga->delete();
        return $this->normalResponse($id, 'Plaga Eliminada');

    }
}

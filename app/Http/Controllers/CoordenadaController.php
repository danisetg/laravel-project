<?php

namespace App\Http\Controllers;

use App\Coordenada;
use App\Http\Requests\CoordenadaRequest;
use Illuminate\Http\Request;

class CoordenadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $response = Coordenada::query();
        $response->where('latitud', 'like', '%'.$request['q'].'%')
            -> orWhere('longitud', 'like', '%'.$request['q'].'%');
        return $response->paginate($request['limit'],['*'],'page',$request['offset']+1);
    }

    /**
     * Show All resources stored
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showAll()
    {
        $coordenadas = Coordenada::all();
        return $this->normalResponse($coordenadas,"Datos Recuperados");
    }

    /**
     * Store new resource
     *
     * @param CoordenadaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CoordenadaRequest $request)
    {
        $coordenada = new Coordenada($request->all());
        $coordenada->save();
        return $this->normalResponse($coordenada, "Objeto Creado");
    }

    /**
     * Display the data of the given coordenada
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $coordenada = Coordenada::findOrFail($id);
        return $this->normalResponse($coordenada, 'Datos Recuperados');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param CoordenadaRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CoordenadaRequest $request, $id)
    {
        $coordenada = Coordenada::findOrFail($id);
        $coordenada->fill($request->all());
        $coordenada->save();
        return $this->normalResponse($coordenada, 'Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $coordenada = Coordenada::findOrFail($id);
        $coordenada->delete();
        return $this->normalResponse($id, 'Coordenada Eliminada');

    }
}

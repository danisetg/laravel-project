<?php

namespace App\Http\Controllers;

use App\Fenologia;
use App\Http\Requests\FenologiaRequest;
use Illuminate\Http\Request;

class FenologiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $response = Fenologia::query();
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
        $fenologias = Fenologia::all();
        return $this->normalResponse($fenologias,"Datos Recuperados");
    }

    /**
     * Store new resource
     *
     * @param FenologiaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(FenologiaRequest $request)
    {
        $fenologia = new Fenologia($request->all());
        $fenologia->save();
        return $this->normalResponse($fenologia, "Objeto Creado");
    }

    /**
     * Display the data of the given fenologia
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $fenologia = Fenologia::findOrFail($id);
        return $this->normalResponse($fenologia, 'Datos Recuperados');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param FenologiaRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(FenologiaRequest $request, $id)
    {
        $fenologia = Fenologia::findOrFail($id);
        $fenologia->fill($request->all());
        $fenologia->save();
        return $this->normalResponse($fenologia, 'Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $fenologia = Fenologia::findOrFail($id);
        $fenologia->delete();
        return $this->normalResponse($id, 'Fenologia Eliminada');

    }
}

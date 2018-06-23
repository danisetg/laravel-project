<?php

namespace App\Http\Controllers;

use App\Http\Requests\VariedadRequest;
use App\Variedad;
use Illuminate\Http\Request;

class VariedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $response = Variedad::query();
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
        $variedades = Variedad::all();
        return $this->normalResponse($variedades,"Datos Recuperados");
    }

    /**
     * Store new resource
     *
     * @param VariedadRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(VariedadRequest $request)
    {
        $variedad = new Variedad($request->all());
        $variedad->save();
        return $this->normalResponse($variedad, "Objeto Creado");
    }

    /**
     * Display the data of the given variedad
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $variedad = Variedad::findOrFail($id);
        $variedad['cultivos'] = $variedad->cultivos()->get();
        return $this->normalResponse($variedad, 'Datos Recuperados');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(VariedadRequest $request, $id)
    {
        $variedad = Variedad::findOrFail($id);
        $variedad['nombre'] = $request['nombre'];
        $variedad['abreviatura'] = $request['abreviatura'];
        $variedad->save();
        return $this->normalResponse($variedad, 'Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Variedad  $variedad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variedad = Variedad::findOrFail($id);
        $variedad->delete();
        return $this->normalResponse($id, 'Variedad Eliminada');

    }
}

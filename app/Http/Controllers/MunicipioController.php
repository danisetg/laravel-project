<?php

namespace App\Http\Controllers;

use App\Http\Requests\MunicipioRequest;
use App\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = '%'.$request['q'].'%';

        //function where for grouping the orWhere statement
        $response = Municipio::where(function ($query) use($q){
           $query->where('nombre', 'like', $q)
               ->orWhere('abreviatura', 'like', $q);
        });


        if($request['provincia_id'] && $request['provincia_id'] != -1){
            $response->where('provincia_id', $request['provincia_id']);
        }


        return $response->with('provincia')->paginate($request['limit'],['*'],'page',$request['offset']+1);
    }


    public function showAll(Request $request)
    {
        $municipios = Municipio::all();
        if($request['provincia_id'])$municipios->where('provincia_id', '=', $request['provincia_id']);
        return $this->normalResponse($municipios,"Datos Recuperados");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param MunicipioRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MunicipioRequest $request)
    {
        $municipio = new Municipio($request->all());
        $municipio->save();
        return $this->normalResponse($municipio, 'Municipio Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio['provincia'] = $municipio->provincia()->get();
        return $this->normalResponse($municipio, 'Datos Recuperados');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param MunicipioRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(MunicipioRequest $request, $id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->fill($request->all());
        $municipio->save();
        return $this->normalResponse($municipio,"Municipio Actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->delete();
        return $this->normalResponse($id, "Municipio Eliminado");
    }
}

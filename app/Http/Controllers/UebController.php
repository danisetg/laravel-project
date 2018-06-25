<?php

namespace App\Http\Controllers;

use App\Http\Requests\UebRequest;
use App\Ueb;
use Illuminate\Http\Request;

class UebController extends Controller
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
        $response = Ueb::where(function ($query) use($q){
            $query->where('nombre', 'like', $q)
                ->orWhere('abreviatura', 'like', $q);
        });


        if($request['empresa_id'] && $request['empresa_id'] != -1){
            $response->where('empresa_id', $request['empresa_id']);
        }


        return $response->with('empresa')->paginate($request['limit'],['*'],'page',$request['offset']+1);
    }


    public function showAll(Request $request)
    {
        $uebs = Ueb::all();
        if($request['empresa_id'])$uebs->where('empresa_id', '=', $request['empresa_id']);
        return $this->normalResponse($uebs,"Datos Recuperados");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param UebRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UebRequest $request)
    {
        $ueb = new Ueb($request->all());
        $ueb->save();
        return $this->normalResponse($ueb, 'Ueb Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $ueb = Ueb::findOrFail($id);
        $ueb['empresa'] = $ueb->empresa()->get();
        return $this->normalResponse($ueb, 'Datos Recuperados');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UebRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UebRequest $request, $id)
    {
        $ueb = Ueb::findOrFail($id);
        $ueb->fill($request->all());
        $ueb->save();
        return $this->normalResponse($ueb,"Ueb Actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $ueb = Ueb::findOrFail($id);
        $ueb->delete();
        return $this->normalResponse($id, "Ueb Eliminado");
    }
}

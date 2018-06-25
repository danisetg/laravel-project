<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Http\Requests\EmpresaRequest;
use Illuminate\Http\Request;

class EmpresaController extends Controller
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
        $response = Empresa::where(function ($query) use($q){
            $query->where('nombre', 'like', $q)
                ->orWhere('abreviatura', 'like', $q);
        });


        if($request['ettp_id'] && $request['ettp_id'] != -1){
            $response->where('ettp_id', $request['ettp_id']);
        }


        return $response->with('ettp')->paginate($request['limit'],['*'],'page',$request['offset']+1);
    }


    public function showAll(Request $request)
    {
        $empresas = Empresa::all();
        if($request['ettp_id'])$empresas->where('ettp_id', '=', $request['ettp_id']);
        return $this->normalResponse($empresas,"Datos Recuperados");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param EmpresaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(EmpresaRequest $request)
    {
        $empresa = new Empresa($request->all());
        $empresa->save();
        return $this->normalResponse($empresa, 'Empresa Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa['ettp'] = $empresa->ettp()->get();
        return $this->normalResponse($empresa, 'Datos Recuperados');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param EmpresaRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EmpresaRequest $request, $id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->fill($request->all());
        $empresa->save();
        return $this->normalResponse($empresa,"Empresa Actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();
        return $this->normalResponse($id, "Empresa Eliminado");
    }
}

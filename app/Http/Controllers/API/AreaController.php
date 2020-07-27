<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Http\Requests\AreaRequest;
use Exception;
use App\Http\Resources\Area as AreaResource;
use App\Http\Resources\AreaCollection;

class AreaController extends Controller
{

    protected $model;

    public function __construct(Area $area)
    {
        $this->model = $area;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = $this->model->all();
        $areasCollection = new AreaCollection($areas);
        return response()->json($areasCollection, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        // dd($request->all());
        // para o código aqui
        try {
            $area = new Area();
            $area->fill($request->all());
            $area->save();
            $areaResource = new AreaResource($area);

            return response()->json($areaResource, 201);
        } catch (\Exception $e) {
            return response()->json([
                'title' => 'Erro',
                'msg' => 'Erro interno do servidor'
   

            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        try {
            $area = $this->model->findOrFail($id);
            $areaResource = new AreaResource($area);
            //dd($area);
            return response()->json($areaResource);
        } catch (\Exception $e) {
            return response()->json([
                'title' => 'Erro',
                'msg' => 'Erro interno do servidor'
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, $id)
    {
        try {
            $area = $this->model->find($id);
            $area->fill($request->all());
            $area->save();
            $areaResource = new AreaResource($area);

            return response()->json($areaResource, 200);
        } catch(Exception $erro) {
            return response()->json([
                'title' => 'Erro',
                'msg' => 'Erro interno do servidor'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $area = $this->model->findOrFail($id);
            $area->delete();

            return response()->json([], 204);
        }  catch(Exception $e){
            return response()->json([
                'title' => 'erro',
                'msg' => 'Erro interno do servidor'
            ], 500);
        }
    }
}

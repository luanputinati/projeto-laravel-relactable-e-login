<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Study;
use Exception;
use Illuminate\Http\Request;
use App\Http\Resources\Study as StudyResource;
use App\Http\Resources\StudyCollection;
use App\Http\Requests\StudyRequest;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Study $study)
    {
        try {
            $studies = $study->all();
            // dd($studies);
            $studiesCollection = new StudyCollection($studies);
            return response()->json($studiesCollection, 200);
        } catch (Exception $e) {
            return response()->json([
                'title' => 'Erro',
                'msg' => 'Erro interno do servidor'
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudyRequest $request)
    {
        $study = new Study();
        $study->fill($request->all());
        $study->save();

        return response()->json(new StudyResource($study), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function show(Study $study)
    {
        return response()->json(new StudyResource($study), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function update(StudyRequest $request, Study $study)
    {
        $study->fill($request->all());
        $study->save();

        return response()->json(new StudyResource($study), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function destroy(Study $study)
    {
        $study->delete();
        return response()->json([], 200);
    }
}

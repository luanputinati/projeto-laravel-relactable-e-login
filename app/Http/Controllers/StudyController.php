<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudyRequest;
use App\Models\Study;
use App\Models\Area;

class StudyController extends Controller
{

    /**
     * @var \App\Models\Study
     */ 
    protected $study;
    protected $area;
    
    public function __construct(Study $study, Area $areaParam){
        $this->middleware('auth');
        $this->study = $study;
        $this->area = $areaParam;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $studies = $this->study->paginate(5);
        return view('studies.index', compact('studies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $areas = $this->area->all();
        return view('studies.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StudyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudyRequest $request){
        $study = new Study();
        $study->fill($request->all());
        $study->save();

        return redirect()->route('studies.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $areas = $this->area->all();
        $study = $this->study->findOrFail($id);
        return view('studies.edit', compact('areas', 'study'));
        // return view('studies.edit', ['areas' => $areas, 'study' => $study]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudyRequest $request, $id)
    {
        $study = $this->study->findOrFail($id);
        $study->fill($request->all());
        $study->save();

        return redirect()->route('studies.index')->withSuccess('Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $study = $this->study->findOrFail($id);
        $study->delete();

        return redirect()->route('studies.index');
    }
}

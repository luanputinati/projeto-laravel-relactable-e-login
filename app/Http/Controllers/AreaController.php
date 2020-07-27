<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Http\Requests\AreaRequest;

class AreaController extends Controller
{   

    /**
     * @var \App\Models\Area
     */

    protected $area;

    public function __construct(Area $area){
        $this->middleware('auth');
        $this->area = $area;
    }
    

    public function index(){
        $areas = $this->area->paginate(5);
        return view('areas.index', compact('areas'));
    }

    public function create(){
        //resources/views/
        return view('areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AreaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request){
        
        $area = new Area();
        $area->fill($request->all());
        $area->save();

        return redirect()->route('areas.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $area = $this->area->findOrFail($id);
        return view('areas.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\AreaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, $id){

        $area = $this->area->findOrFail($id);
        $area->fill($request->all());
        $area->save();

        return redirect()->route('areas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $area = $this->area->findOrFail($id);
        $area->delete();

        return redirect()->route('areas.index');
    }
}

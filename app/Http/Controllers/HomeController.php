<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Correios;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
        
    }
    
    public function checkDb(){
        
        $finalizado = DB::table('studies')->where('status', '=', 'Finalizado')->get();
        $finalizadocount = $finalizado->count();
        $atrasado = DB::table('studies')->where('status', '=', 'Atrasado')->get();
        $atrasadocount = $atrasado->count();
        $andamento = DB::table('studies')->where('status', '=', 'Andamento')->get();
        $andamentocount = $andamento->count();

        return view('home', compact('finalizadocount', 'atrasadocount', 'andamentocount'));
    }
    
}

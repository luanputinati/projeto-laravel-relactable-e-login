@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="card-deck">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header">Finalizado</div>
                            <div class="card-body">
                                <h5 class="card-title text-center"> {{ $finalizadocount }} </h5>
                            </div>
                        </div>

                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Atrasado</div>
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $atrasadocount }}</h5>
                            </div>
                        </div>

                        <div class="card text-black bg-warning mb-3" style="max-width: 18rem;">
                            <div class="card-header">Andamento</div>
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $andamentocount }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastro de Estudos</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('studies.store') }}" method="post" class="mt-3">
        @include('studies._partial.form')
    </form>
</div>
@endsection
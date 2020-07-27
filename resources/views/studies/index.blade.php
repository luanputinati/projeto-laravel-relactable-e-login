@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listagem de Estudos</h1>
    <a href="{{ route('studies.create') }}" class="btn btn-info">Cadastrar</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Área</th>
                <th>Data Inicial</th>
                <th>Data Final</th>
                <th>Situação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($studies as $study)
            <tr>
               
                <th>{{ $study->id }}</th>
                <th>{{ $study->description }}</th>
                <th>{{ $study->area->description }}</th>
                <th>{{ $study->date_init }}</th>
                <th>{{ $study->date_finish }}</th>
                <th>{{ $study->status }}</th>
                <td>
                    <a href="{{ route('studies.edit', ['study' => $study->id]) }}" class="btn btn-info">Editar</a>
                    <form action="{{ route('studies.destroy', ['study' => $study->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $studies->links()}}
</div>
@endsection
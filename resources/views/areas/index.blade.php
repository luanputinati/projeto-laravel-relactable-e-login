@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listagem de Áreas
            <a href="{{ route('areas.create') }}">
        <button class="btn btn-primary">Cadastrar</button>
             </a>
        </h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Cor</th>
                    <th>Ações</th>   
                </tr>
                <tbody>
                   @foreach($areas as $area)
                   <tr>
                        <td>{{ $area->id }}</td>
                        <td>{{ $area->description }}</td>
                        <td>{{ $area->color }}</td>
                    <td>
                        <a href="{{ route('areas.edit', ['area' => $area->id]) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('areas.destroy', ['area' => $area->id]) }}"method="post">
                        @csrf
                        <input type="hidden" name="_method" value="delete"/>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                    </td>
                   </tr>
                   @endforeach
                </tbody>
            </thead>
        </table>
        {{ $areas->links() }}
    </div>
@endsection
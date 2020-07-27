@extends('layouts.app')
 
@section('content')
<div class="container">
 
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
 
    <h1>Editar Áreas</h1>
 
    <form action="{{ route('areas.update', ['area' => $area->id]) }}" method="post">
        <input type="hidden" name="_method" value="put"/>
        @include('areas._partial.form')
    </form>
</div>
@endsection
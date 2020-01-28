@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar menu</h1>
    <hr>
    <form action="{{route('menu.update',$menu->id)}}" method="post">
        
        {{csrf_field()}}
        <p class="form-group">
            <label>Nome do menu</label>
            <input type="text" name="name" value="{{$menu->name}}" class="form-control @if($errors->has('name')) is-invalid @endif">
            @if($errors->has('name'))
                {{$errors->first('name')}}
            @endif
        </p>

        <p class="form-group">
            <label>preço</label>
            <input type="text" name="price" value="{{$menu->price}}" class="form-control @if($errors->has('price')) is-invalid @endif">
            @if($errors->has('price'))
                {{$errors->first('price')}}
            @endif
        </p>

        <p>
            <input type="submit" value="Salvar" class="btn btn-success">
        </p>
    </form>
</div>
@endsection
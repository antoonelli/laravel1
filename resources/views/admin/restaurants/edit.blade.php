@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar restaurant</h1>
    <hr>
    <form action="{{route('restaurant.update',$restaurant->id)}}" method="post">
        
        {{csrf_field()}}
        <p class="form-group">
            <label>Nome do Restaurante</label>
            <input type="text" name="name" value="{{$restaurant->name}}" class="form-control @if($errors->has('name')) is-invalid @endif">
            @if($errors->has('name'))
                {{$errors->first('name')}}
            @endif
        </p>

        <p class="form-group">
            <label>Endereço</label>
            <input type="text" name="address" value="{{$restaurant->address}}" class="form-control @if($errors->has('name')) is-invalid @endif">
            @if($errors->has('name'))
                {{$errors->first('name')}}
            @endif
        </p>

        <p class="form-group"> 
            <label>Fale sobre o restaurante</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control @if($errors->has('name')) is-invalid @endif" >{{$restaurant->description}}</textarea>
            @if($errors->has('name'))
                {{$errors->first('name')}}
            @endif
        </p>
        <p>
            <input type="submit" value="Salvar" class="btn btn-success">
        </p>
    </form>
</div>
@endsection
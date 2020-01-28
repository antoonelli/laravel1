@extends('layouts.app')

@section('content')


<div class="container">

<table><h1>Usuarios</h1>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<a href="{{route('user.new')}}" class="pull-right btn btn-success"><h2>Novo usuario</h2></a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>criado em</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        <tbody>
            @foreach($user as $r)
                <tr>
                    <td>{{$r->id}}</td>
                    <td>{{$r->name}}</td>
                    <td>{{$r->created_at}}</td>
                    <td>
                        <a href="{{route('user.edit',['user' => $r->id])}}"><i class="fa fa-pencil" aria-hidden="true" class="pull-right btn btn-yellow" style="color:#f9a900;"></i></a>
                    </td>
                    <td>
                        <a href="{{route('user.delete',['id' => $r->id])}}"><i class="fa fa-window-close" aria-hidden="true" style="color:red;"></i></a>
                    </td>
                </tr>   
            @endforeach
        </tbody>
    </thead>
</table>

</div>
@endsection
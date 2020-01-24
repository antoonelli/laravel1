<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>criado em</th>
            <th>ações</th>
        </tr>
        <tbody>
            @foreach($restaurant as $r)
                <tr>
                    <td>{{$r->id}}</td>
                    <td>{{$r->name}}</td>
                    <td>{{$r->created_at}}</td>
                    <td>
                        <a href="{{route('restaurant.edit',['restaurant' => $r->id])}}">Editar</a>
                    </td>
                    <td>
                        <a href="{{route('restaurant.delete',['id' => $r->id])}}">excluir</a>
                    </td>
                </tr>   
            @endforeach
        </tbody>
    </thead>
</table>
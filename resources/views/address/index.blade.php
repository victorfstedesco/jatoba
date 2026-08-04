<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@if ($address->isNotEmpty())
<table>
   <tr>
    <th>ID</th>
    <th>Nome</th>
    <Th>Categoria</Th>
    <th>Preço</th>
    <th>Unidades</th>
    <th>Editar</th>
    <th>Excluir</th>
  </tr>
  <tbody>
      @foreach ($address as $a)
    <tr>
    <td>{{$a->id}}</td>
    <td>{{$a->street}}</td>
    <td>{{$a->postal}}</td>
    <td>{{$a->neighborhood}}</td>
    <td>{{$a->description}}</td>
    <td><a href="/address/edit/{{$a->id}}">editar</a></td>
    <td>
        <form action="/address/{{$a->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button>excluir</button>
        </form>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<a href="/address/create">novo endereço</a>
@endif

</body>
</html>

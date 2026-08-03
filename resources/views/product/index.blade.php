<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
      @foreach ($products as $p)
    <tr>
    <td>{{$p->id}}</td>
    <td><a href="/product/{{$p->id}}">{{$p->name}}</a></td>
    <td>{{$p->category->name}}</td>
    <td>{{$p->price}}</td>
    <td>{{$p->units}}</td>
    <td><a href="/product/edit/{{$p->id}}">editar</a></td>
    <td>
        <form action="/product/{{$p->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button>excluir</button>
        </form>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>

</body>
</html>
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
  </tr>
  <tbody>
      @foreach ($categories as $c)
    <tr>
    <td>{{$c->id}}</td>
    <td><a href="/category/{{$c->id}}">{{$c->name}}</a></td>
    <td><a href="/category/edit/{{$c->id}}">editar</a></td>
    <td>
        <form action="/category/{{$c->id}}" method="POST">
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
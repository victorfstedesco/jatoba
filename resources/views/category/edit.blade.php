<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/category/{{$category->id}}" method="POST">
        @csrf
        @method('PUT')
        <label>Nome</label>
        <input type="text" name="name" value="{{$category->name}}">

        <label>URL</label>
        <input type="text" name="url" value="{{$category->url}}">

        <button type="submit">Editar</button>
    </form>
</body>
</html>
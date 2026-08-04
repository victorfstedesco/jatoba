<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/product" method="POST">
        @csrf
        <label>Nome</label>
        <input type="text" name="name">

        <label>Preço</label>
        <input type="number" name="price">

        <label>discount</label>
        <input type="number" name="discount">

        <label>Description</label>
        <textarea name="description"></textarea>

        <label>Unidades</label>
        <input type="number" name="units">

        <label>Url imagem</label>
        <textarea type="number" name="urls"></textarea>

        <label>Categoria</label>
        <select name="category_id">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>

        <button type="submit">Criar</button>
    </form>
</body>
</html>

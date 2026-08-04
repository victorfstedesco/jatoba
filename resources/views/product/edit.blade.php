<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/product/{{$product->id}}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome</label>
        <input type="text" name="name" value="{{$product->name}}">

        <label>Preço</label>
        <input type="number" name="price" value="{{$product->price}}">

        <label>discount</label>
        <input type="number" name="discount" value="{{$product->discount}}">

        <label>Description</label>
        <textarea name="description">{{$product->description}}</textarea>

        <label>Unidades</label>
        <input type="number" name="units" value="{{$product->units}}">

        <label>Urls das Imagens (1 por linha)</label>
        <textarea name="urls" style="width: 100%;" rows="5">{{ implode("\n", $imageUrls) }}</textarea>

        <label>Categoria</label>
        <select name="category_id">
            @foreach($categories as $category)
            <option value="{{$category->id}}" {{$category->id==$product->category->id? "selected" : ""}}>{{$category->name}}</option>
            @endforeach
        </select>

        <button type="submit">Editar</button>
    </form>
</body>
</html>

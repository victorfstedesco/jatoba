<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{$category->name}}</h1>
    <div>
    <p>Image</p>
    <img src="{{ $category->url }}" alt="">
    </div>

    <div>
    <h2>Produtos com esta categoria</h2>
     @foreach($category->products as $product)
        {{$product}}

    @endforeach   
    </div>
    
</body>
</html>
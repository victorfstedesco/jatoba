<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{$product->name}}</h1>
    <div>
    <p>Preço</p>
    <span>{{$product->price}}</span>
    </div>
    <div>
    <p>description</p>
    <span>{{$product->description}}</span>
    </div>
    <div>
    <p>Unidades</p>
    <span>{{$product->units}}</span>
    </div>
    <div>
    <p>Categoria</p>
    <span>{{$product->category->name}}</span>
    </div>
</body>
</html>
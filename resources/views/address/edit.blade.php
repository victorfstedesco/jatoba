<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/address" method="POST">
        @csrf
        @method('PUT')
        <label>Rua</label>
        <input type="text" name="street" value="{{$address->street}}">

        <label>CEP</label>
        <input type="text" name="postal" value="{{$address->postal}}">

        <label>Bairro</label>
        <input type="text" name="neighborhood" value="{{$address->neighborhood}}">


        <label>Complemento</label>
        <textarea name="description">{{$address->description}}</textarea>

        <button type="submit">Editar</button>
    </form>
</body>
</html>

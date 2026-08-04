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
        <label>Rua</label>
        <input type="text" name="street">
        
        <label>CEP</label>
        <input type="text" name="postal">

        <label>Bairro</label>
        <input type="text" name="neighborhood">
        

        <label>Complemento</label>
        <textarea name="description"></textarea>

        <button type="submit">Criar</button>
    </form>
</body>
</html>
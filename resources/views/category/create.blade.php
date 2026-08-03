<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/category" method="POST">
        @csrf
        <label>Nome</label>
        <input type="text" name="name">

        <label>URL</label>
        <input type="text" name="url">

        <button type="submit">Criar</button>
    </form>
</body>
</html>
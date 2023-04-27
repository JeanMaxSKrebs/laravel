<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    @if (isset($cliente))
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Localizacao</th>
                <th>Cpf</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->idade}}</td>
                <td>{{$cliente->localizacao}}</td>
                <td>{{$cliente->cpf}}</td>
            </tr>
        </tbody>
    </table>
    @else
    <p>cliente não encontrado! </p>
    @endif
    <a href="/clientes/">
        Voltar
    </a>
</body>
</html>
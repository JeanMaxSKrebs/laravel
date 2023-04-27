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
    @if ($clientes->count()>0)
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
            @foreach($clientes as $cliente)
            <tr>
                <td>
                    <a target=_blank href="/cliente/{{$cliente->id}}">
                        {{$cliente->id}}
                    </a>
                </td>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->idade}}</td>
                <td>{{$cliente->localizacao}}</td>
                <td>{{$cliente->cpf}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Clientes não encontrados! </p>
    @endif
</body>
</html>
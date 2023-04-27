<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Salaos</title>
</head>
<body>
    <h1>Salaos</h1>
    @if (isset($salao))
    <table>
        <thead>
        <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Capacidade</th>
                <th>Localizacao</th>
                <th>Cnpj</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$salao->id}}</td>
                <td>{{$salao->nome}}</td>
                <td>{{$salao->descricao}}</td>
                <td>{{$salao->capacidade}}</td>
                <td>{{$salao->localizacao}}</td>
                <td>{{$salao->cnpj}}</td>
            </tr>
        </tbody>
    </table>
    @else
    <p>salao não encontrado! </p>
    @endif
    <a href="/salaos/">
        Voltar
    </a>
</body>
</html>
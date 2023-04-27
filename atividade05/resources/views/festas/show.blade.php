<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Festas</title>
</head>
<body>
    <h1>Festas</h1>
    @if (isset($festa))
    <table>
        <thead>
        <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>ID_Salão</th>
                <th>ID_Cliente</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$festa->id}}</td>
                <td>{{$festa->nome}}</td>
                <td>{{$festa->id_festa}}</td>
                <td>{{$festa->id_cliente}}</td>
                <td>{{$festa->data}}</td>
            </tr>
        </tbody>
    </table>
    @else
    <p>festa não encontrado! </p>
    @endif
    <a href="/festas/">
        Voltar
    </a>
</body>
</html>
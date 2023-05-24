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
    @if ($festas->count()>0)
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>ID_Salão</th>
                <th>cliente_id</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($festas as $festa)
            <tr>
                <td>
                    <a target=_blank href="/festa/{{$festa->id}}">
                        {{$festa->id}}
                    </a>
                </td>
                <td>{{$festa->nome}}</td>
                <td>{{$festa->salao_id}}</td>
                <td>{{$festa->cliente_id}}</td>
                <td>{{$festa->data}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>festas não encontrados! </p>
    @endif
</body>
</html>
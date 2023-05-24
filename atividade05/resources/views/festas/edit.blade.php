<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit new Festa</h1>
    <form action="{{route('festa.update',$festa->id)}}" method="POST">
        @csrf
        <table>
        <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{$festa->nome}}"/></td>
            </tr>
            <tr>
                <td>Data:</td>
                <td><input type="date" name="data" value="{{$festa->data}}"/></td>
            </tr>
            <tr>
                <td>ID Salão:</td>
                <td><input type="number" name="salao_id" value="{{$festa->salao_id}}"/></td>
            </tr>
            <tr>
                <td>ID Cliente:</td>
                <td><input type="number" name="cliente_id" value="{{$festa->cliente_id}}"/></td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input type="submit" value="Salvar"/>
                    <a href="/festas">
                        <button form=cancel >Cancelar</button>
                    </a>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/festas" style="display: inline">&#9664;&nbsp;Voltar</a></td>
            </tr>
        </table>
    </form>
</body>
</html>

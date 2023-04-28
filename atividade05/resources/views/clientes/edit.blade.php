<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit new Cliente</h1>
    <form action="{{route('cliente.update',$cliente->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{$cliente->nome}}"/></td>
            </tr>
            <tr>
            <td>Idade:</td>
                <td><input type="number" name="idade" value="{{$cliente->idade}}"/></td>    
            </tr>
            <tr>
            <td>Localização:</td>
                <td><input type="text" name="localizacao" value="{{$cliente->localizacao}}"/></td>
            </tr>
            <tr>
            <td>Cpf:</td>
                <td><input type="number" name="cpf" value="{{$cliente->cpf}}"/></td>
            </tr>
            <tr>
                <td>Importado:</td>
                <td><input type="checkbox" name="importado" {{($cliente->importado)?'checked':''}}/></td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input type="submit" value="Salvar"/>
                    <a href="/produtos">
                        <button form=cancel >Cancelar</button>
                    </a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

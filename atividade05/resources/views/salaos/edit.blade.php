<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit new Salão</h1>
    <form action="{{route('salao.update',$salao->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{$salao->nome}}"/></td>
            </tr>
            <tr>
                <td>Descricao:</td>
                <td><input type="textarea" name="descricao" id="" cols="30" rows="10"  value="{{$salao->descricao}}"></input></td>
            </tr>
            <tr>
                <td>Capacidade de pessoas:</td>
                <td><input type="number" name="capacidade"  value="{{$salao->capacidade}}"/></td>
            </tr>
            <tr>
                <td>Localização:</td>
                <td><input type="text" name="localizacao"  value="{{$salao->localizacao}}"/></td>
            </tr>
            <tr>
                <td>Cnpj:</td>
                <td><input type="number" name="cnpj"  value="{{$salao->cnpj}}"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Criar"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/salaos" style="display: inline">&#9664;&nbsp;Voltar</a></td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input type="submit" value="Salvar"/>
                    <a href="/salaos">
                        <button form=cancel >Cancelar</button>
                    </a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

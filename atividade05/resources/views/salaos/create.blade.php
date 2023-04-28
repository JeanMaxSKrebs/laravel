<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Insert new Salao</h1>
    <form action="/salao" method="POST">
        @csrf
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome"/></td>
            </tr>
            <tr>
                <td>Descricao:</td>
                <td><textarea name="descricao" id="" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Capacidade de pessoas:</td>
                <td><input type="number" name="capacidade"/></td>
            </tr>
            <tr>
                <td>Localização:</td>
                <td><input type="text" name="localizacao"/></td>
            </tr>
            <tr>
                <td>Cnpj:</td>
                <td><input type="number" name="cnpj"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Criar"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/salaos" style="display: inline">&#9664;&nbsp;Voltar</a></td>
            </tr>
        </table>
    </form>
</body>

</html>

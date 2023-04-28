<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Insert new Festa</h1>
    <form action="/festa" method="POST">
        @csrf
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome"/></td>
            </tr>
            <tr>
                <td>Data:</td>
                <td><input type="date" name="data"/></td>
            </tr>
            <tr>
                <td>ID Salão:</td>
                <td><input type="number" name="id_salao"/></td>
            </tr>
            <tr>
                <td>ID Cliente:</td>
                <td><input type="number" name="id_cliente"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Criar"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/festas" style="display: inline">&#9664;&nbsp;Voltar</a></td>
            </tr>
        </table>
    </form>
</body>

</html>

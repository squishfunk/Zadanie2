<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

    </style>
</head>

<body>

    <form method="POST" action="/projekty">
        @csrf

        <label for="name">Nazwa Projektu: </label>
        <input type="text" name="name"><br><br>
        <label for="website">Strona: </label>
        <input type="text" name="website"><br><br>
        <select name="active" value="0">
            <option value="0">Nieaktywne</option>
            <option value="1">Aktywne</option>
            <option value="2">W trakcie realizacji</option>
        </select><br><br>
        <button>Zaktualizuj</button>
    </form>
</body>

</html>

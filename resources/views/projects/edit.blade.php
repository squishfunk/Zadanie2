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

    <form method="POST" action="/{{ $project->id }}">
        @method('PUT')
        @csrf

        <label for="name">Nazwa Projektu: </label>
        <input type="text" name="name" value="{{ $project->projectName }}"><br><br>
        <label for="groupName">Nazwa grupy projektu: </label>
        <input type="text" name="groupName" value="{{ $project->project_groupName }}"><br><br>
        <label for="campaignName">Nazwa kampanii: </label>
        <input type="text" name="campaignName" value="{{ $project->project_group_campaignsName }}"><br><br>
        <label for="address">Adres strony: </label>
        <input type="text" name="address" value="{{ $project->website }}"><br><br>
        <label for="active">Aktywność: </label>
        <select name="active" value="{{ $project->active }}">
            <option value="0">Nieaktywne</option>
            <option value="1">Aktywne</option>
            <option value="2">W trakcie realizacji</option>
        </select><br><br>
        <label for="date">Data początkowa: </label>
        <input type="date" name="date" value="{{ $project->date_start }}"><br><br>

        <button>Zaktualizuj</button>
    </form>
</body>

</html>

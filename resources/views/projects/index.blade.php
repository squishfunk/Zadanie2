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
    <a href="/projekty/create">Dodaj</a><br>
    <label>Pokaż: </label>
    <a href="?active=all">Wszystko</a>
    <a href="?active=1">Aktywne</a>
    <a href="?active=2">W trakcie realizacji</a>
    <a href="?active=0">Nieaktywne</a>

    <table>
        <tr>
            <td>Nazwa projektu</td>
            <td>Nazwa grupy projektu</td>
            <td>Nazwa kampanii</td>
            <td>Adres strony</td>
            <td>Aktywność</td>
        </tr>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->projectName }}</td>
                <td>{{ $project->project_groupName }}</td>
                <td>{{ $project->project_group_campaignsName }}</td>
                <td>{{ $project->website }}</td>
                <td><?php if ($project->active == 1) {
                    echo 'Aktywny';
                    } elseif ($project->active == 0) {
                    echo 'Nieaktywny';
                    } else {
                    echo 'W trakcie realizacji';
                    } ?></td>
                <td><a href="{{ $project->id }}/edit">EDYTUJ</a></td>
                <td><a href="{{ $project->id }}/destroy"> @method('DELETE')USUŃ</a></td>
            </tr>
        @endforeach
    </table>
    {{ $projects->links() }}
</body>

</html>

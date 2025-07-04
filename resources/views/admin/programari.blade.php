<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Index Programări | Clinica Mobilă</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 30px;}
        th, td { padding: 7px 11px; border: 1px solid #ddd; }
        th { background: #f0f7ff; }
        tr:nth-child(even) { background: #f9fbfd; }
    </style>
</head>
<body>
    <h2>Toate programările</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nume</th>
                <th>Prenume</th>
                <th>Specialitate</th>
                <th>Medic</th>
                <th>Data</th>
                <th>Ora</th>
                <th>Telefon</th>
                <th>Email</th>
                <th>Motiv</th>
                <th>Mesaj</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programari as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->nume }}</td>
                <td>{{ $p->prenume }}</td>
                <td>{{ $p->specialitate }}</td>
                <td>{{ $p->medic }}</td>
                <td>{{ $p->data }}</td>
                <td>{{ $p->ora }}</td>
                <td>{{ $p->telefon }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->motiv }}</td>
                <td>{{ $p->mesaj }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

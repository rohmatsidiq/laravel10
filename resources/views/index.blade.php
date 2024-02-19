<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <div class="container">
        <table border="1">
            <thead>
                <tr>

                    <th>Nama</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td>{{$d->name}}</td>
                    <td>{{$d->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
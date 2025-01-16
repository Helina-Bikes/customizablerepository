<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department List</title>
</head>
<body>
    <h1>Department List</h1>
    <table>
        <thead>
            <tr>
                <th>Department Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($department as $department)
                <tr>
                    <td>{{ $department->departmentname }}</td>
                    <td>{{ $department->departmentdesc}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
</head>
<body>
    <h1>Add Department</h1>
    <form action="{{ route('department.store') }}" method="POST">
        @csrf
        <!-- Department form fields here -->
        <label for="departmentname">Organization Name</label>
        <input type="text" name="departmentname" required><br>

        <label for="departmentdesc">Organization Description</label>
        <input type="text" name="departmentdesc" required><br>

        <button type="submit">Add Organiation</button>
    </form>
</body>
</html>

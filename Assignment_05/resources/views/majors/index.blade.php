<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Major List Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</head>
<body>
    <div class="row mb-5">
        <nav class="navbar navbar-light bg-light">
            <div class="menu w-75 mx-auto">
                <a class="navbar-brand" href="#">Navbar</a>
                <div class="row float-end">
                    <a href="{{ route('student.index') }}"
                        class="col-md-6 text-decoration-none text-secondary ">Students</a>
                    <a href="{{ route('major.index') }}" class="col-md-6 text-decoration-none text-dark ">Majors</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="w-75 mx-auto mb-3">
        <a href="{{ route('major.createPage') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="card w-75 mx-auto">
        <div class="card-header">
            <h2>Major Lists</h2>
        </div>
        <div class="card-body">
            <table class="table table-strip">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($majors as $major)
                        <tr>
                            <td>{{ $major['id'] }}</td>
                            <td>{{ $major['name'] }}</td>
                            <td>
                                <form action="{{ route('major.delete', $major['id']) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('major.editPage', $major['id']) }}"
                                        class="btn btn-success btn-sm">Edit</a>
                                    <button type="submit" name="btnDelete" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

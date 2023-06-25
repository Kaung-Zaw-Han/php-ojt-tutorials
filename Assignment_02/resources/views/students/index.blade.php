<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student List Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="row mb-5">
        <nav class="navbar navbar-light bg-light">
            <div class="menu w-75 mx-auto">
                <a class="navbar-brand" href="#">Navbar</a>
                <div class="row float-end">
                    <a href="{{ route('student.index') }}" class="col-md-6 text-decoration-none text-dark ">Students</a>
                    <a href="{{ route('major.index') }}"
                        class="col-md-6 text-decoration-none text-secondary ">Majors</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="w-75 mx-auto mb-5">
        <a href="{{ route('student.createPage') }}" class="btn btn-primary">Create</a>
        <div class="float-end">
            <form action="{{ route('student.import') }}" method="POST" class="d-inline" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="" id="choose">
                <button type="button" class="btn btn-primary" id="show-btn"
                    onclick="document.getElementById('choose').click()">Import</button>
                <button type="submit" class="btn btn-primary import-btn">Import</button>
            </form>
            <a href="{{ route('student.export') }}" class="btn btn-primary">Export</a>
        </div>
    </div>
    <div class="card w-75 mx-auto">
        <div class="card-header">
            <h2>Student Lists</h2>
        </div>
        <div class="card-body">
            <table class="table table-strip">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Major</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student['id'] }}</td>
                            <td>{{ $student['name'] }}</td>
                            <td>{{ $student['majorName'] }}</td>
                            <td>{{ $student['phone'] }}</td>
                            <td>{{ $student['email'] }}</td>
                            <td>{{ $student['address'] }}</td>
                            <td>
                                <form action="{{ route('student.delete', $student['id']) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('student.editPage', $student['id']) }}"
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
    @if (session('importSuccess'))
        <div class="alert alert-success alert-dismissible fade show w-50 mx-auto mt-3" role="alert">
            <strong>{{ session('importSuccess') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <script>
        $(document).ready(function() {
            $('#show-btn').click(function() {
                $(this).toggle();
                $('.import-btn').toggleClass('import-btn');
            });
        });
    </script>
</body>
</html>
